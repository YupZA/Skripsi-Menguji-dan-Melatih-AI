let audioContext;
let analyser;
let microphone;

let dataset = [];
let nextSampleId = 1;

let model = null;
let isListening = false;

// =====================
// INIT MIC
// =====================

async function initAudio() {

    if (!navigator.mediaDevices?.getUserMedia) {
        throw new Error("Browser tidak mendukung akses mikrofon.");
    }

    const stream =
        await navigator.mediaDevices.getUserMedia({
            audio: true
        });

    audioContext =
        new (
            window.AudioContext ||
            window.webkitAudioContext
        )();

    analyser =
        audioContext.createAnalyser();

    analyser.fftSize = 256;
    analyser.smoothingTimeConstant = 0.8;

    microphone =
        audioContext.createMediaStreamSource(stream);

    microphone.connect(analyser);

    console.log("Microphone Ready");
}


// =====================
// AMBIL FFT
// =====================

function getAudioFeatures() {

    const data =
        new Uint8Array(
            analyser.frequencyBinCount
        );

    analyser.getByteFrequencyData(data);

    return Array.from(data)
        .map(v => v / 255);
}

// =====================
// TAMBAH KELAS
// =====================

function addClass() {

    const container =
        document.getElementById("classContainer");

    const cards =
        container.querySelectorAll(".audio-class-card");

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

    div.className = "audio-class-card";
    div.dataset.classId = classId;

    div.innerHTML = `
        <div class="card-top">

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
            Nama kelas suara
        </label>

        <input
            type="text"
            class="class-name"
            placeholder="Contoh: Nama suara"
            oninput="updateAudioClassName(this)"
        >

        <label class="input-label">
            Nama data suara
        </label>

        <input
            type="text"
            class="sample-name"
            placeholder="Contoh: Rekaman pertama"
        >

        <button
            type="button"
            class="record-btn"
            onclick="recordSample(this)"
        >
            Rekam 3 Detik
        </button>

        <div class="sample-section">

            <p class="sample-title">
                Data yang direkam
            </p>

            <div class="sample-list">
                <p class="empty-sample">
                    Belum ada data suara.
                </p>
            </div>

        </div>
    `;

    container.appendChild(div);
}

// =====================
// RECORD DATA
// =====================

async function recordSample(button) {

    const card = button.closest(".audio-class-card");

    const classId = Number(card.dataset.classId);
    const classNameInput = card.querySelector(".class-name");
    const sampleNameInput = card.querySelector(".sample-name");

    const className = classNameInput.value.trim();
    let sampleName = sampleNameInput.value.trim();

    if (!className) {
        alert("Masukkan nama kelas terlebih dahulu.");
        classNameInput.focus();
        return;
    }

    if (!sampleName) {

        const classSamples = dataset.filter(
            item => item.classId === classId
        );

        sampleName =
            `${className} - Data ${classSamples.length + 1}`;
    }

    try {

        await ensureAudioReady();

    } catch (error) {

        console.error(error);

        alert(
            "Mikrofon tidak dapat digunakan. Pastikan izin mikrofon telah diberikan."
        );

        return;
    }

    const recordStatus =
        document.getElementById("recordStatus");

    button.disabled = true;

    const collectedFeatures = [];

    for (let second = 3; second >= 1; second--) {

        recordStatus.innerText =
            `🔴 Merekam "${sampleName}"... ${second}`;

        // Mengambil beberapa data FFT setiap detik
        for (let frame = 0; frame < 5; frame++) {

            collectedFeatures.push(getAudioFeatures());

            await delay(200);
        }
    }

    const averagedFeatures =
        averageAudioFeatures(collectedFeatures);

    const sample = {
        id: nextSampleId++,
        input: averagedFeatures,
        classId: classId,
        className: className,
        sampleName: sampleName
    };

    dataset.push(sample);

    renderClassSamples(card, classId);
    updateDatasetInformation();

    sampleNameInput.value = "";

    recordStatus.innerText =
        `✅ "${sampleName}" masuk ke kelas "${className}"`;

    button.disabled = false;

    resetAudioModel();
}

function delay(milliseconds) {

    return new Promise(resolve => {
        setTimeout(resolve, milliseconds);
    });

}

function averageAudioFeatures(featureCollection) {

    const featureLength = featureCollection[0].length;
    const result = new Array(featureLength).fill(0);

    featureCollection.forEach(features => {

        features.forEach((value, index) => {
            result[index] += value;
        });

    });

    return result.map(value =>
        value / featureCollection.length
    );
}

async function ensureAudioReady() {

    if (audioContext && analyser) {

        if (audioContext.state === "suspended") {
            await audioContext.resume();
        }

        return;
    }

    await initAudio();
}

function renderClassSamples(card, classId) {

    const sampleList =
        card.querySelector(".sample-list");

    const dataCount =
        card.querySelector(".data-count");

    const classSamples =
        dataset.filter(item =>
            item.classId === classId
        );

    dataCount.innerText =
        `${classSamples.length} data`;

    if (classSamples.length === 0) {

        sampleList.innerHTML = `
            <p class="empty-sample">
                Belum ada data suara.
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
                        <strong>${escapeHtml(sample.sampleName)}</strong>
                        <small>
                            Kelas: ${escapeHtml(sample.className)}
                        </small>
                    </div>
                </div>

                <button
                    type="button"
                    class="delete-sample-btn"
                    onclick="deleteAudioSample(${sample.id})"
                    title="Hapus data"
                >
                    ×
                </button>

            </div>
        `).join("");
}

function deleteAudioSample(sampleId) {

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
            `.audio-class-card[data-class-id="${sample.classId}"]`
        );

    if (card) {
        renderClassSamples(card, sample.classId);
    }

    updateDatasetInformation();
    resetAudioModel();

    document.getElementById("recordStatus").innerText =
        `Data "${sample.sampleName}" dihapus.`;
}

function updateDatasetInformation() {

    document.getElementById("datasetInfo").innerText =
        `${dataset.length} sampel dari ${new Set(dataset.map(item => item.classId)).size
        } kelas`;

}

function escapeHtml(value) {

    const element = document.createElement("div");

    element.innerText = value;

    return element.innerHTML;
}

// =====================
// TRAIN
// =====================

async function trainModel() {

    const cards =
        Array.from(
            document.querySelectorAll(".audio-class-card")
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

        if (sampleCount < 2) {

            alert(
                `Kelas "${className}" minimal memiliki 2 data suara.`
            );

            return;
        }
    }

    const trainingStatus =
        document.getElementById("trainingStatus");

    trainingStatus.innerText =
        "Menyiapkan dataset...";

    const activeClassIds =
        cards.map(card =>
            Number(card.dataset.classId)
        );

    const classIndexMap =
        new Map(
            activeClassIds.map((classId, index) => [
                classId,
                index
            ])
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
                classIndexMap.get(item.classId)
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
            inputShape: [
                analyser.frequencyBinCount
            ],
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
            epochs: 20,
            shuffle: true,

            callbacks: {

                onEpochEnd: async (epoch, logs) => {

                    const accuracy =
                        logs.acc ??
                        logs.accuracy ??
                        0;

                    trainingStatus.innerText =
                        `Pelatihan ${epoch + 1}/20 — ` +
                        `Akurasi ${(accuracy * 100).toFixed(1)}%`;

                    await tf.nextFrame();
                }

            }
        });

        trainingStatus.innerText =
            "✅ Training selesai. Model siap diuji.";

        model.classIds = activeClassIds;

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

function resetAudioModel() {

    if (model) {
        model.dispose();
        model = null;
    }

    stopListening();

    document.getElementById("trainingStatus").innerText =
        "Dataset berubah. Silakan latih kembali.";

    document.getElementById("result").innerHTML =
        "Belum ada prediksi";
}

// =====================
// TEST REALTIME
// =====================

async function startListening() {

    if (!model) {

        alert("Latih AI terlebih dahulu.");

        return;
    }

    if (isListening) {
        return;
    }

    try {

        await ensureAudioReady();

    } catch (error) {

        alert("Mikrofon tidak dapat digunakan.");

        return;
    }

    isListening = true;

    document.getElementById(
        "startListeningButton"
    ).disabled = true;

    document.getElementById(
        "stopListeningButton"
    ).disabled = false;

    document.getElementById(
        "listeningStatus"
    ).innerText =
        "🎤 AI sedang mendengarkan...";

    while (isListening) {

        const input =
            tf.tensor2d([
                getAudioFeatures()
            ]);

        const prediction =
            model.predict(input);

        const values =
            await prediction.data();

        input.dispose();
        prediction.dispose();

        displayAudioPrediction(values);

        await delay(400);
    }
}



function stopListening() {

    isListening = false;

    const startButton =
        document.getElementById(
            "startListeningButton"
        );

    const stopButton =
        document.getElementById(
            "stopListeningButton"
        );

    if (startButton) {
        startButton.disabled = false;
    }

    if (stopButton) {
        stopButton.disabled = true;
    }

    const status =
        document.getElementById(
            "listeningStatus"
        );

    if (status) {
        status.innerText =
            "Pengujian suara dihentikan.";
    }
}

function displayAudioPrediction(values) {

    const cards =
        Array.from(
            document.querySelectorAll(".audio-class-card")
        );

    const classIds =
        model.classIds || [];

    const results =
        Array.from(values).map((probability, index) => {

            const classId = classIds[index];

            const card =
                cards.find(item =>
                    Number(item.dataset.classId) === classId
                );

            const className =
                card?.querySelector(".class-name")
                    ?.value.trim() ||
                `Kelas ${index + 1}`;

            return {
                className,
                probability
            };
        });

    results.sort((a, b) =>
        b.probability - a.probability
    );

    const highestResult = results[0];
    const highestPercentage =
        highestResult.probability * 100;

    let confidenceDescription;

    if (highestPercentage >= 80) {

        confidenceDescription =
            "Tingkat keyakinan tinggi.";

    } else if (highestPercentage >= 60) {

        confidenceDescription =
            "Tingkat keyakinan sedang.";

    } else {

        confidenceDescription =
            "Tingkat keyakinan rendah. Coba ulangi suara atau tambahkan data pelatihan.";
    }

    document.getElementById("result").innerHTML = `
        <div class="main-audio-result">

            <span class="result-caption">
                Suara terdeteksi sebagai
            </span>

            <h2>${escapeHtml(highestResult.className)}</h2>

            <strong>
                ${highestPercentage.toFixed(1)}%
            </strong>

            <p>${confidenceDescription}</p>

        </div>

        <div class="all-audio-results">

            <h4>Keyakinan Setiap Kelas</h4>

            ${results.map(result => {

                const percentage =
                    result.probability * 100;

                return `
                    <div class="audio-result-item">

                        <div class="audio-result-info">
                            <span>
                                ${escapeHtml(result.className)}
                            </span>

                            <strong>
                                ${percentage.toFixed(1)}%
                            </strong>
                        </div>

                        <div class="audio-result-bar">
                            <div
                                class="audio-result-progress"
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

function updateAudioClassName(input) {

    const card = input.closest(".audio-class-card");
    const displayName = card.querySelector(".class-display-name");

    displayName.innerText =
        input.value.trim() || "Belum diberi nama";

}

document.addEventListener("DOMContentLoaded", function () {

    const audioGuideModal =
        document.getElementById("audioGuideModal");

    if (audioGuideModal) {
        document.body.appendChild(audioGuideModal);
    }

});

function openAudioGuideModal() {

    const modal =
        document.getElementById("audioGuideModal");

    if (!modal) {
        return;
    }

    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");

    modal.scrollTop = 0;

    document.body.classList.add("modal-open");

    const closeButton =
        modal.querySelector(".guide-modal-close");

    if (closeButton) {
        closeButton.focus();
    }
}

function closeAudioGuideModal() {

    const modal =
        document.getElementById("audioGuideModal");

    if (!modal) {
        return;
    }

    modal.classList.remove("active");
    modal.setAttribute("aria-hidden", "true");

    document.body.classList.remove("modal-open");
}

document.addEventListener("keydown", function (event) {

    if (event.key === "Escape") {

        const modal =
            document.getElementById("audioGuideModal");

        if (modal?.classList.contains("active")) {
            closeAudioGuideModal();
        }
    }

});

document.getElementById(
    "startListeningButton"
).innerHTML = "Mulai Mendengar";

document.getElementById(
    "stopListeningButton"
).disabled = false;

document.getElementById(
    "stopListeningButton"
).innerHTML = "⏹ Berhenti";

document.getElementById(
    "stopListeningButton"
).disabled = true;

document.getElementById(
    "stopListeningButton"
).innerHTML = "⏹ Berhenti";

// =====================
// GLOBAL
// =====================

window.addClass =
    addClass;

window.recordSample =
    recordSample;

window.trainModel =
    trainModel;

window.startListening =
    startListening;

window.stopListening = 
    stopListening;

window.updateAudioClassName = 
    updateAudioClassName;

window.deleteAudioSample = 
    deleteAudioSample;

window.openAudioGuideModal =
    openAudioGuideModal;

window.closeAudioGuideModal =
    closeAudioGuideModal;