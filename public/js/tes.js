let detector;
let model;
let dataset = [];
let labels = [];
let currentClass = 0;

const video = document.getElementById("webcam");
const resultText = document.getElementById("result");

async function initCamera() {
    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
    video.srcObject = stream;
}

async function initPose() {
    detector = await poseDetection.createDetector(
        poseDetection.SupportedModels.MoveNet
    );
}

function addClass() {
    const container = document.getElementById("classContainer");

    const div = document.createElement("div");
    div.className = "upload-box";

    div.innerHTML = `
        <input type="text" placeholder="Nama kelas" class="class-name">
    `;

    container.appendChild(div);
}

function extractKeypoints(keypoints) {
    return keypoints.flatMap(p => [p.x, p.y]);
}

async function capturePose() {
    const poses = await detector.estimatePoses(video);

    if (!poses.length) return;

    const keypoints = poses[0].keypoints;

    const classInputs = document.querySelectorAll('.class-name');

    if (classInputs.length === 0) return;

    const classIndex = currentClass % classInputs.length;

    dataset.push({
        input: extractKeypoints(keypoints),
        label: classIndex
    });

    currentClass++;

    alert("Data pose tersimpan!");
}

async function trainModel() {
    if (dataset.length === 0) return alert("Dataset kosong");

    const numClasses = new Set(dataset.map(d => d.label)).size;

    const xs = tf.tensor(dataset.map(d => d.input));
    const ys = tf.oneHot(
        tf.tensor1d(dataset.map(d => d.label), 'int32'),
        numClasses
    );

    model = tf.sequential();

    model.add(tf.layers.dense({ inputShape: [34], units: 64, activation: 'relu' }));
    model.add(tf.layers.dense({ units: 32, activation: 'relu' }));
    model.add(tf.layers.dense({ units: numClasses, activation: 'softmax' }));

    model.compile({ optimizer: 'adam', loss: 'categoricalCrossentropy', metrics: ['accuracy'] });

    await model.fit(xs, ys, {
        epochs: 20,
        callbacks: {
            onEpochEnd: (epoch, logs) => {
                document.getElementById("trainingStatus").innerText =
                    `Epoch ${epoch + 1} - Loss: ${logs.loss.toFixed(4)}`;
            }
        }
    });

    startPrediction();
}

async function startPrediction() {
    while (true) {
        const poses = await detector.estimatePoses(video);

        if (poses.length && model) {
            const input = tf.tensor([extractKeypoints(poses[0].keypoints)]);
            const prediction = model.predict(input);
            const data = await prediction.data();

            const maxIndex = data.indexOf(Math.max(...data));

            resultText.innerText = `Kelas: ${maxIndex}`;
        }

        await new Promise(r => setTimeout(r, 200));
    }
}

initCamera();
initPose();

window.addClass = addClass;
window.capturePose = capturePose;
window.trainModel = trainModel;