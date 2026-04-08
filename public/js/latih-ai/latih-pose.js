let detector;
let model;
let dataset = [];

let video;
let canvas;
let ctx;
let resultText;

// =============================
// INIT
// =============================
document.addEventListener("DOMContentLoaded", () => {
    init();
});

async function init() {
    video = document.getElementById("webcam");
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
    resultText = document.getElementById("result");

    await initCamera();
    await initPose();

    startRenderLoop();

    console.log("✅ Camera & Pose ready");
}

// =============================
// CAMERA
// =============================
async function initCamera() {
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert("Browser tidak mendukung webcam");
        return;
    }

    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
    video.srcObject = stream;

    return new Promise(resolve => {
        video.onloadedmetadata = () => {
            video.play();

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            resolve();
        };
    });
}

// =============================
// POSE DETECTION
// =============================
async function initPose() {
    detector = await poseDetection.createDetector(
        poseDetection.SupportedModels.MoveNet
    );
}

// =============================
// DRAW SKELETON
// =============================
function drawKeypoints(keypoints) {
    keypoints.forEach(p => {
        if (p.score > 0.4) {
            ctx.beginPath();
            ctx.arc(p.x, p.y, 5, 0, 2 * Math.PI);
            ctx.fillStyle = "#00e0ff";
            ctx.fill();
        }
    });
}

function drawSkeleton(keypoints) {
    const pairs = poseDetection.util.getAdjacentPairs(
        poseDetection.SupportedModels.MoveNet
    );

    pairs.forEach(([i, j]) => {
        const kp1 = keypoints[i];
        const kp2 = keypoints[j];

        if (kp1.score > 0.4 && kp2.score > 0.4) {
            ctx.beginPath();
            ctx.moveTo(kp1.x, kp1.y);
            ctx.lineTo(kp2.x, kp2.y);
            ctx.strokeStyle = "#00e0ff";
            ctx.lineWidth = 2;
            ctx.stroke();
        }
    });
}

// =============================
// RENDER LOOP (REALTIME VISUAL)
// =============================
async function startRenderLoop() {
    while (true) {
        if (detector) {
            const poses = await detector.estimatePoses(video);

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            if (poses.length) {
                const keypoints = poses[0].keypoints;

                drawKeypoints(keypoints);
                drawSkeleton(keypoints);

                // 🔥 PREDIKSI REALTIME
                if (model) {
                    const input = tf.tensor([extractKeypoints(keypoints)]);
                    const prediction = model.predict(input);
                    const data = await prediction.data();

                    const maxIndex = data.indexOf(Math.max(...data));

                    const classInputs = document.querySelectorAll('.class-name');
                    const className = classInputs[maxIndex]?.value || `Kelas ${maxIndex + 1}`;

                    resultText.innerText = `Prediksi: ${className}`;
                }
            }
        }

        await new Promise(r => setTimeout(r, 100));
    }
}

// =============================
// DATASET
// =============================
function extractKeypoints(keypoints) {
    return keypoints.flatMap(p => [p.x, p.y]);
}

function addClass() {
    const container = document.getElementById("classContainer");
    const index = document.querySelectorAll('.upload-box').length;

    const div = document.createElement("div");
    div.className = "upload-box";

    div.innerHTML = `
        <label>Kelas ${index + 1}</label>
        <input type="text" class="class-name" placeholder="Nama kelas">
        <p class="data-count">0 data</p>
        <button onclick="capturePose(${index})">Ambil Data</button>
    `;

    container.appendChild(div);
}

async function capturePose(classIndex) {
    if (!detector) return alert("Pose detector belum siap");

    const poses = await detector.estimatePoses(video);

    if (!poses.length) return alert("Pose tidak terdeteksi");

    const keypoints = poses[0].keypoints;

    const classInputs = document.querySelectorAll('.class-name');
    const countEls = document.querySelectorAll('.data-count');

    const className = classInputs[classIndex].value || `Kelas ${classIndex + 1}`;

    dataset.push({
        input: extractKeypoints(keypoints),
        label: classIndex
    });

    const currentCount = parseInt(countEls[classIndex].innerText);
    countEls[classIndex].innerText = `${currentCount + 1} data`;

    resultText.innerText = `Data masuk ke: ${className}`;
}

// =============================
// TRAIN MODEL
// =============================
async function trainModel() {
    if (dataset.length === 0) return alert("Dataset kosong");

    const numClasses = new Set(dataset.map(d => d.label)).size;

    if (numClasses < 2) {
        alert("Minimal 2 kelas!");
        return;
    }

    const xs = tf.tensor(dataset.map(d => d.input));
    const ys = tf.oneHot(
        tf.tensor1d(dataset.map(d => d.label), 'int32'),
        numClasses
    );

    model = tf.sequential();

    model.add(tf.layers.dense({ inputShape: [34], units: 64, activation: 'relu' }));
    model.add(tf.layers.dense({ units: 32, activation: 'relu' }));
    model.add(tf.layers.dense({ units: numClasses, activation: 'softmax' }));

    model.compile({
        optimizer: 'adam',
        loss: 'categoricalCrossentropy',
        metrics: ['accuracy']
    });

    await model.fit(xs, ys, {
        epochs: 20,
        callbacks: {
            onEpochEnd: (epoch) => {
                document.getElementById("trainingStatus").innerText =
                    `AI sedang belajar (${epoch + 1}/20)`;
            }
        }
    });

    document.getElementById("trainingStatus").innerText = "✅ Training selesai!";
}

// =============================
// GLOBAL (UNTUK BLADE)
// =============================
window.addClass = addClass;
window.capturePose = capturePose;
window.trainModel = trainModel;