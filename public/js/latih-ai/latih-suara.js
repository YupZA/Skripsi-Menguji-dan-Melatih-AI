let audioContext;
let analyser;
let microphone;

let dataset = [];
let model = null;

let isListening = false;

// =====================
// INIT MIC
// =====================

async function initAudio() {

    const stream =
        await navigator.mediaDevices.getUserMedia({
            audio: true
        });

    audioContext =
        new AudioContext();

    analyser =
        audioContext.createAnalyser();

    analyser.fftSize = 256;

    microphone =
        audioContext.createMediaStreamSource(
            stream
        );

    microphone.connect(analyser);

    console.log("🎤 Microphone Ready");
}

initAudio();

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

    const index =
        document.querySelectorAll(
            ".audio-class-card"
        ).length;

    const div =
        document.createElement("div");

    div.className =
        "audio-class-card";

    div.innerHTML = `
    <div class="card-top">
        <h4>Kelas ${index + 1}</h4>
        <span class="data-count">0 data</span>
    </div>

    <input
        type="text"
        class="class-name"
        placeholder="Contoh: Nama suara">

    <button
        class="record-btn"
        onclick="recordSample(${index})">
        Rekam 3 Detik
    </button>
`;

    container.appendChild(div);
}

// =====================
// RECORD DATA
// =====================

async function recordSample(classIndex) {

    const recordStatus =
        document.getElementById("recordStatus");

    recordStatus.innerText = "🔴 Merekam... 3";

    let countdown = 2;

    const timer = setInterval(() => {

        recordStatus.innerText =
            `🔴 Merekam... ${countdown}`;

        countdown--;

    }, 1000);

    await new Promise(resolve =>
        setTimeout(resolve, 3000)
    );

    clearInterval(timer);

    recordStatus.innerText =
        "Menyimpan data...";

    const sample =
        getAudioFeatures();

    dataset.push({
        input: sample,
        label: classIndex
    });

    const counts =
        document.querySelectorAll(
            ".data-count"
        );

    const current =
        parseInt(
            counts[classIndex].innerText
        );

    counts[classIndex].innerText =
        `${current + 1} data`;

    const classInputs =
        document.querySelectorAll(
            ".class-name"
        );

    const className =
        classInputs[classIndex].value ||
        `Kelas ${classIndex + 1}`;

    document.getElementById(
        "datasetInfo"
    ).innerText =
        `${dataset.length} sampel`;

    recordStatus.innerText =
        `✅ Data masuk ke ${className}`;
}

// =====================
// TRAIN
// =====================

async function trainModel() {

    if (dataset.length < 4) {

        alert(
            "Minimal 2 data tiap kelas"
        );

        return;
    }

    const labels =
        [...new Set(
            dataset.map(d => d.label)
        )];

    const numClasses =
        labels.length;

    const xs =
        tf.tensor2d(
            dataset.map(d => d.input)
        );

    const ys =
        tf.oneHot(
            tf.tensor1d(
                dataset.map(d => d.label),
                "int32"
            ),
            numClasses
        );

    model =
        tf.sequential();

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
        tf.layers.dense({
            units: 32,
            activation: "relu"
        })
    );

    model.add(
        tf.layers.dense({
            units: numClasses,
            activation: "softmax"
        })
    );

    model.compile({
        optimizer: "adam",
        loss: "categoricalCrossentropy",
        metrics: ["accuracy"]
    });

    await model.fit(
        xs,
        ys,
        {
            epochs: 20,
            callbacks: {
                onEpochEnd:
                    (epoch) => {

                        document.getElementById(
                            "trainingStatus"
                        ).innerText =
                            `AI belajar (${epoch + 1}/20)`;

                    }
            }
        }
    );

    document.getElementById(
        "trainingStatus"
    ).innerText =
        "✅ Training selesai";
}

// =====================
// TEST REALTIME
// =====================

async function startListening() {

    if (!model) {

        alert(
            "Latih AI terlebih dahulu"
        );

        return;
    }

    isListening = true;

    while (isListening) {

        const input =
            tf.tensor2d([
                getAudioFeatures()
            ]);

        const prediction =
            model.predict(input);

        const data =
            await prediction.data();

        const maxIndex =
            data.indexOf(
                Math.max(...data)
            );

        const confidence =
            (
                data[maxIndex] * 100
            ).toFixed(1);

        const classInputs =
            document.querySelectorAll(
                ".class-name"
            );

        const className =
            classInputs[maxIndex]
                ?.value ||
            `Kelas ${maxIndex + 1}`;

        document.getElementById(
            "result"
        ).innerText =
            `${className} (${confidence}%)`;

        await new Promise(
            r => setTimeout(r, 300)
        );
    }
}

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