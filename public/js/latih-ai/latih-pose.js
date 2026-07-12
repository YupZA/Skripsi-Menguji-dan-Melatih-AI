let detector;
let model;
let dataset = [];

let nextSampleId = 1;
let isPredicting = true;

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
                if (model && isPredicting) {

                    const features =
                        extractKeypoints(keypoints);

                    if (features) {

                        const input =
                            tf.tensor2d([features]);

                        const prediction =
                            model.predict(input);

                        const values =
                            await prediction.data();

                        input.dispose();
                        prediction.dispose();

                        displayPosePrediction(values);
                    }
                }
            }
        }

        await new Promise(r => setTimeout(r, 100));
    }
}

function displayPosePrediction(values) {

    const cards =
        Array.from(
            document.querySelectorAll(
                ".upload-box"
            )
        );

    const classIds =
        model.classIds || [];

    const results =
        Array.from(values).map(
            (probability, index) => {

                const classId =
                    classIds[index];

                const card =
                    cards.find(item =>
                        Number(
                            item.dataset.classId
                        ) === classId
                    );

                const className =
                    card
                        ?.querySelector(
                            ".class-name"
                        )
                        ?.value.trim() ||
                    `Kelas ${index + 1}`;

                return {
                    className,
                    probability
                };
            }
        );

    results.sort(
        (a, b) =>
            b.probability -
            a.probability
    );

    const highestResult =
        results[0];

    const highestPercentage =
        highestResult.probability * 100;

    let message;

    if (highestPercentage >= 80) {

        message =
            "Model memiliki tingkat keyakinan tinggi.";

    } else if (
        highestPercentage >= 60
    ) {

        message =
            "Model memiliki tingkat keyakinan sedang.";

    } else {

        message =
            "Keyakinan model masih rendah. Pastikan pose terlihat jelas.";
    }

    resultText.innerHTML = `
        <div class="main-pose-result">

            <span class="result-caption">
                Pose terdeteksi sebagai
            </span>

            <h2>
                ${escapeHtml(
        highestResult.className
    )}
            </h2>

            <strong class="confidence-value">
                ${highestPercentage.toFixed(1)}%
            </strong>

            <p>
                ${message}
            </p>

        </div>

        <div class="all-pose-results">

            <h4>
                Keyakinan Setiap Kelas
            </h4>

            ${results.map(result => {

        const percentage =
            result.probability * 100;

        return `
                    <div class="pose-result-item">

                        <div class="pose-result-info">

                            <span>
                                ${escapeHtml(
            result.className
        )}
                            </span>

                            <strong>
                                ${percentage.toFixed(1)}%
                            </strong>

                        </div>

                        <div class="pose-result-bar">

                            <div
                                class="pose-result-progress"
                                style="width: ${percentage}%"
                            ></div>

                        </div>

                    </div>
                `;

    }).join("")}

        </div>

        <p class="result-note">
            Persentase menunjukkan tingkat keyakinan model,
            bukan ukuran kepastian mutlak.
        </p>
    `;
}

// =============================
// DATASET
// =============================
function extractKeypoints(keypoints) {

    const validPoints =
        keypoints.filter(point =>
            point.score >= 0.4
        );

    if (validPoints.length < 5) {
        return null;
    }

    const leftHip = keypoints[11];
    const rightHip = keypoints[12];

    let centerX;
    let centerY;

    if (
        leftHip?.score >= 0.4 &&
        rightHip?.score >= 0.4
    ) {

        centerX =
            (leftHip.x + rightHip.x) / 2;

        centerY =
            (leftHip.y + rightHip.y) / 2;

    } else {

        centerX =
            validPoints.reduce(
                (total, point) =>
                    total + point.x,
                0
            ) / validPoints.length;

        centerY =
            validPoints.reduce(
                (total, point) =>
                    total + point.y,
                0
            ) / validPoints.length;
    }

    const distances =
        validPoints.map(point =>
            Math.hypot(
                point.x - centerX,
                point.y - centerY
            )
        );

    const scale =
        Math.max(...distances) || 1;

    return keypoints.flatMap(point => {

        if (point.score < 0.4) {
            return [0, 0];
        }

        return [
            (point.x - centerX) / scale,
            (point.y - centerY) / scale
        ];
    });
}

function addClass() {

    const container =
        document.getElementById("classContainer");

    const cards =
        container.querySelectorAll(".upload-box");

    const classId =
        cards.length > 0
            ? Math.max(
                ...Array.from(cards).map(card =>
                    Number(card.dataset.classId)
                )
            ) + 1
            : 0;

    const classNumber = cards.length + 1;

    const div =
        document.createElement("div");

    div.className = "upload-box";
    div.dataset.classId = classId;

    div.innerHTML = `
        <div class="class-header">

            <div>
                <span class="class-label">
                    Kelas ${classNumber}
                </span>

                <h4 class="class-display-name">
                    Belum diberi nama
                </h4>
            </div>

            <span class="data-count">
                0 data
            </span>

        </div>

        <label class="input-label">
            Nama kelas pose
        </label>

        <input
            type="text"
            class="class-name"
            placeholder="Contoh: Nama pose"
            oninput="updatePoseClassName(this)"
        >

        <label class="input-label">
            Nama data pose
        </label>

        <input
            type="text"
            class="sample-name"
            placeholder="Contoh: Pose pertama"
        >

        <button
            type="button"
            class="capture-btn"
            onclick="capturePose(this)"
        >
            Ambil Data Pose
        </button>

        <div class="sample-section">

            <p class="sample-title">
                Data yang diambil
            </p>

            <div class="sample-list">

                <p class="empty-sample">
                    Belum ada data pose.
                </p>

            </div>

        </div>
    `;

    container.appendChild(div);

    resetPoseModel();
}

function updatePoseClassName(input) {

    const card =
        input.closest(".upload-box");

    const displayName =
        card.querySelector(".class-display-name");

    displayName.innerText =
        input.value.trim() ||
        "Belum diberi nama";
}

async function capturePose(button) {

    if (!detector) {
        alert("Pose detector belum siap.");
        return;
    }

    const card =
        button.closest(".upload-box");

    const classId =
        Number(card.dataset.classId);

    const classNameInput =
        card.querySelector(".class-name");

    const sampleNameInput =
        card.querySelector(".sample-name");

    const className =
        classNameInput.value.trim();

    let sampleName =
        sampleNameInput.value.trim();

    if (!className) {

        alert("Masukkan nama kelas terlebih dahulu.");

        classNameInput.focus();

        return;
    }

    const classSamples =
        dataset.filter(item =>
            item.classId === classId
        );

    if (!sampleName) {

        sampleName =
            `${className} - Data ${classSamples.length + 1}`;
    }

    button.disabled = true;
    button.innerText = "Menyiapkan pose...";

    resultText.innerText =
        "Pertahankan pose selama proses pengambilan data.";

    await delay(1000);

    const collectedPoses = [];

    for (let frame = 0; frame < 10; frame++) {

        const poses =
            await detector.estimatePoses(video);

        if (poses.length > 0) {

            const features =
                extractKeypoints(
                    poses[0].keypoints
                );

            if (features) {
                collectedPoses.push(features);
            }
        }

        button.innerText =
            `Mengambil data ${frame + 1}/10`;

        await delay(100);
    }

    if (collectedPoses.length < 5) {

        alert(
            "Pose tidak terdeteksi dengan baik. Pastikan seluruh tubuh terlihat."
        );

        button.disabled = false;
        button.innerText = "Ambil Data Pose";

        return;
    }

    const averagedPose =
        averagePoseFeatures(collectedPoses);

    const sample = {
        id: nextSampleId++,
        input: averagedPose,
        classId,
        className,
        sampleName
    };

    dataset.push(sample);

    renderPoseSamples(card, classId);
    updatePoseDatasetInformation();

    sampleNameInput.value = "";

    resultText.innerText =
        `Data "${sampleName}" masuk ke kelas "${className}".`;

    button.disabled = false;
    button.innerText = "Ambil Data Pose";

    resetPoseModel();
}

function delay(milliseconds) {

    return new Promise(resolve => {
        setTimeout(resolve, milliseconds);
    });
}

function averagePoseFeatures(collection) {

    const featureLength =
        collection[0].length;

    const result =
        new Array(featureLength).fill(0);

    collection.forEach(features => {

        features.forEach((value, index) => {
            result[index] += value;
        });

    });

    return result.map(value =>
        value / collection.length
    );
}

function renderPoseSamples(card, classId) {

    const sampleList =
        card.querySelector(".sample-list");

    const countElement =
        card.querySelector(".data-count");

    const classSamples =
        dataset.filter(item =>
            item.classId === classId
        );

    countElement.innerText =
        `${classSamples.length} data`;

    if (classSamples.length === 0) {

        sampleList.innerHTML = `
            <p class="empty-sample">
                Belum ada data pose.
            </p>
        `;

        return;
    }

    sampleList.innerHTML =
        classSamples.map((sample, index) => `
            <div class="sample-item">

                <div class="sample-info">

                    <span class="sample-number">
                        ${index + 1}
                    </span>

                    <div>

                        <strong>
                            ${escapeHtml(sample.sampleName)}
                        </strong>

                        <small>
                            Kelas:
                            ${escapeHtml(sample.className)}
                        </small>

                    </div>

                </div>

                <button
                    type="button"
                    class="delete-sample-btn"
                    onclick="deletePoseSample(${sample.id})"
                    title="Hapus data pose"
                >
                    ×
                </button>

            </div>
        `).join("");
}

function deletePoseSample(sampleId) {

    const sample =
        dataset.find(item =>
            item.id === sampleId
        );

    if (!sample) {
        return;
    }

    dataset =
        dataset.filter(item =>
            item.id !== sampleId
        );

    const card =
        document.querySelector(
            `.upload-box[data-class-id="${sample.classId}"]`
        );

    if (card) {
        renderPoseSamples(
            card,
            sample.classId
        );
    }

    updatePoseDatasetInformation();
    resetPoseModel();

    resultText.innerText =
        `Data "${sample.sampleName}" telah dihapus.`;
}

function updatePoseDatasetInformation() {

    const datasetInfo =
        document.getElementById("datasetInfo");

    if (!datasetInfo) {
        return;
    }

    const classCount =
        new Set(
            dataset.map(item =>
                item.classId
            )
        ).size;

    datasetInfo.innerText =
        `${dataset.length} data dari ${classCount} kelas`;
}
// =============================
// TRAIN MODEL
// =============================
async function trainModel() {

    const cards =
        Array.from(
            document.querySelectorAll(
                ".upload-box"
            )
        );

    if (cards.length < 2) {

        alert("Minimal harus terdapat dua kelas.");

        return;
    }

    for (const card of cards) {

        const classId =
            Number(card.dataset.classId);

        const classInput =
            card.querySelector(".class-name");

        const className =
            classInput.value.trim();

        if (!className) {

            alert("Semua kelas harus memiliki nama.");

            classInput.focus();

            return;
        }

        const sampleCount =
            dataset.filter(item =>
                item.classId === classId
            ).length;

        if (sampleCount < 3) {

            alert(
                `Kelas "${className}" minimal memiliki 3 data pose.`
            );

            return;
        }
    }

    const trainingStatus =
        document.getElementById(
            "trainingStatus"
        );

    trainingStatus.innerText =
        "Menyiapkan dataset...";

    const activeClassIds =
        cards.map(card =>
            Number(card.dataset.classId)
        );

    const classIndexMap =
        new Map(
            activeClassIds.map(
                (classId, index) => [
                    classId,
                    index
                ]
            )
        );

    const trainingData =
        dataset.filter(item =>
            classIndexMap.has(item.classId)
        );

    const xs =
        tf.tensor2d(
            trainingData.map(item =>
                item.input
            )
        );

    const labelTensor =
        tf.tensor1d(
            trainingData.map(item =>
                classIndexMap.get(
                    item.classId
                )
            ),
            "int32"
        );

    const ys =
        tf.oneHot(
            labelTensor,
            activeClassIds.length
        );

    if (model) {
        model.dispose();
    }

    model = tf.sequential();

    model.add(
        tf.layers.dense({
            inputShape: [34],
            units: 64,
            activation: "relu"
        })
    );

    model.add(
        tf.layers.dropout({
            rate: 0.2
        })
    );

    model.add(
        tf.layers.dense({
            units: 32,
            activation: "relu"
        })
    );

    model.add(
        tf.layers.dense({
            units: activeClassIds.length,
            activation: "softmax"
        })
    );

    model.compile({
        optimizer: "adam",
        loss: "categoricalCrossentropy",
        metrics: ["accuracy"]
    });

    try {

        await model.fit(xs, ys, {
            epochs: 30,
            shuffle: true,

            callbacks: {

                onEpochEnd: async (
                    epoch,
                    logs
                ) => {

                    const accuracy =
                        logs.acc ??
                        logs.accuracy ??
                        0;

                    trainingStatus.innerText =
                        `Pelatihan ${epoch + 1}/30 — ` +
                        `Akurasi ${(accuracy * 100).toFixed(1)}%`;

                    await tf.nextFrame();
                }

            }
        });

        model.classIds = activeClassIds;

        trainingStatus.innerText =
            "✅ Training selesai. Model siap diuji.";

        resultText.innerHTML = `
    <div class="pose-ready-message">
        Model telah dilatih.<br>
        Lakukan pose di depan kamera.
    </div>
`;

    } catch (error) {

        console.error(error);

        trainingStatus.innerText =
            "Training gagal.";

        alert(
            "Terjadi kesalahan saat melatih model."
        );

    } finally {

        xs.dispose();
        labelTensor.dispose();
        ys.dispose();
    }
}

function escapeHtml(value) {

    const element =
        document.createElement("div");

    element.innerText = value;

    return element.innerHTML;
}

function resetPoseModel() {

    if (model) {
        model.dispose();
        model = null;
    }

    const trainingStatus =
        document.getElementById(
            "trainingStatus"
        );

    if (trainingStatus) {

        trainingStatus.innerText =
            "Dataset berubah. Silakan latih kembali.";
    }

    if (resultText) {

        resultText.innerHTML =
            "Belum ada prediksi";
    }
}

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const modal =
            document.getElementById(
                "poseGuideModal"
            );

        if (modal) {
            document.body.appendChild(modal);
        }
    }
);

function openPoseGuideModal() {

    const modal =
        document.getElementById(
            "poseGuideModal"
        );

    if (!modal) {
        return;
    }

    modal.classList.add("active");
    modal.setAttribute(
        "aria-hidden",
        "false"
    );

    modal.scrollTop = 0;

    document.body.classList.add(
        "modal-open"
    );
}

function closePoseGuideModal() {

    const modal =
        document.getElementById(
            "poseGuideModal"
        );

    if (!modal) {
        return;
    }

    modal.classList.remove("active");
    modal.setAttribute(
        "aria-hidden",
        "true"
    );

    document.body.classList.remove(
        "modal-open"
    );
}

// =============================
// GLOBAL (UNTUK BLADE)
// =============================
window.addClass = addClass;
window.capturePose = capturePose;
window.trainModel = trainModel;

window.updatePoseClassName =
    updatePoseClassName;

window.deletePoseSample =
    deletePoseSample;

window.openPoseGuideModal =
    openPoseGuideModal;

window.closePoseGuideModal =
    closePoseGuideModal;