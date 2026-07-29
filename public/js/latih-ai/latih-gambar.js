console.log("TensorFlow:", typeof tf);

let model;

let catImages = [];
let notCatImages = [];

document.addEventListener("change", function (e) {

    if (!e.target.classList.contains("class-images")) {
        return;
    }

    const input = e.target;
    const uploadBox = input.closest(".upload-box");
    const files = Array.from(input.files);

    const imageCount = uploadBox.querySelector(".image-count");
    const previewContainer = uploadBox.querySelector(".image-preview");

    previewContainer.innerHTML = "";

    if (files.length === 0) {
        imageCount.innerText = "Belum ada gambar";
        return;
    }

    imageCount.innerText = `${files.length} gambar dipilih`;

    files.forEach((file, index) => {

        const item = document.createElement("div");
        item.className = "preview-item";

        const img = document.createElement("img");
        const imageUrl = URL.createObjectURL(file);

        img.src = imageUrl;
        img.alt = file.name;

        img.onload = function () {
            URL.revokeObjectURL(imageUrl);
        };

        const fileName = document.createElement("span");
        fileName.innerText = file.name;

        item.appendChild(img);
        item.appendChild(fileName);

        previewContainer.appendChild(item);
    });

    resetModel();
});

function resetModel() {

    if (model) {
        model.dispose();
        model = null;
    }

    document.getElementById("trainingStatus").innerText =
        "Dataset berubah. Silakan latih kembali.";

    document.getElementById("result").innerHTML = "";
}

// Membaca Gambar
async function loadImage(file) {

    return new Promise(resolve => {
        let img = new Image();
        img.src = URL.createObjectURL(file);
        img.onload = () => resolve(img);
    });

}

// Mengubah gambar menjadi angka
function imageToTensor(img) {

    return tf.browser.fromPixels(img)
        .resizeNearestNeighbor([64, 64])
        .toFloat()
        .div(255)
        .expandDims();

}

// Membuat dan melatih CNN nya 
async function trainModel() {

    const classes = document.querySelectorAll(".upload-box");
    const trainingStatus = document.getElementById("trainingStatus");

    if (classes.length < 2) {
        alert("Minimal harus terdapat dua kelas.");
        return;
    }

    const xs = [];
    const ys = [];

    for (let i = 0; i < classes.length; i++) {

        const classNameInput = classes[i].querySelector(".class-name");
        const files = classes[i].querySelector(".class-images").files;
        const className = classNameInput.value.trim();

        if (className === "") {
            alert(`Nama Kelas ${i + 1} belum diisi.`);
            classNameInput.focus();
            return;
        }

        if (files.length < 3) {
            alert(
                `Kelas "${className}" minimal harus memiliki 3 gambar.`
            );
            return;
        }
    }

    trainingStatus.innerText = "Menyiapkan dataset...";

    try {

        for (let i = 0; i < classes.length; i++) {

            const files = classes[i]
                .querySelector(".class-images")
                .files;

            for (const file of files) {

                const img = await loadImage(file);
                const imageTensor = imageToTensor(img);

                xs.push(imageTensor);

                const label = new Array(classes.length).fill(0);
                label[i] = 1;

                ys.push(label);
            }
        }

        const xTensor = tf.concat(xs);
        const yTensor = tf.tensor2d(ys);

        xs.forEach(tensor => tensor.dispose());

        if (model) {
            model.dispose();
        }

        model = tf.sequential();

        model.add(tf.layers.conv2d({
            filters: 16,
            kernelSize: 3,
            activation: "relu",
            inputShape: [64, 64, 3]
        }));

        model.add(tf.layers.maxPooling2d({
            poolSize: 2
        }));

        model.add(tf.layers.flatten());

        model.add(tf.layers.dense({
            units: 64,
            activation: "relu"
        }));

        model.add(tf.layers.dense({
            units: classes.length,
            activation: "softmax"
        }));

        model.compile({
            optimizer: "adam",
            loss: "categoricalCrossentropy",
            metrics: ["accuracy"]
        });

        trainingStatus.innerText = "Proses pelatihan dimulai...";

        // proses belajar model nya
        await model.fit(xTensor, yTensor, {
            epochs: 10,
            shuffle: true,

            callbacks: {
                onEpochEnd: async (epoch, logs) => {

                    const accuracy =
                        logs.acc !== undefined
                            ? logs.acc
                            : logs.accuracy;

                    trainingStatus.innerText =
                        `Pelatihan ${epoch + 1}/10 — ` +
                        `Loss: ${logs.loss.toFixed(4)} — ` +
                        `Akurasi: ${(accuracy * 100).toFixed(2)}%`;

                    await tf.nextFrame();
                }
            }
        });

        xTensor.dispose();
        yTensor.dispose();

        trainingStatus.innerText =
            "Pelatihan selesai. Model siap digunakan untuk prediksi.";

    } catch (error) {

        console.error("Training error:", error);

        trainingStatus.innerText =
            "Pelatihan gagal. Silakan periksa kembali dataset.";

        alert("Terjadi kesalahan saat melatih model.");
    }
}

function openGuideModal() {

    const modal = document.getElementById("guideModal");

    if (!modal) {
        return;
    }

    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");

    modal.scrollTop = 0;

    document.body.classList.add("modal-open");
}

function closeGuideModal() {

    const modal = document.getElementById("guideModal");

    if (!modal) {
        return;
    }

    modal.classList.remove("active");
    modal.setAttribute("aria-hidden", "true");

    document.body.classList.remove("modal-open");
}

document.addEventListener("keydown", function (event) {

    if (event.key === "Escape") {
        closeGuideModal();
    }

});

function closeGuideModal() {

    const modal = document.getElementById("guideModal");

    if (!modal) {
        return;
    }

    modal.classList.remove("active");
    modal.setAttribute("aria-hidden", "true");

    document.body.classList.remove("modal-open");
}

document.addEventListener("keydown", function (event) {

    if (event.key === "Escape") {
        closeGuideModal();
    }

});

// Menguji gambarnya
async function predict() {

    if (!model) {
        alert("Model belum dilatih. Silakan latih model terlebih dahulu.");
        return;
    }

    const fileInput = document.getElementById("testImage");
    const file = fileInput.files[0];

    if (!file) {
        alert("Masukkan gambar yang ingin diprediksi.");
        return;
    }

    const classInputs = document.querySelectorAll(".class-name");
    const classNames = Array.from(classInputs).map((input, index) => {
        return input.value.trim() || `Kelas ${index + 1}`;
    });

    const img = await loadImage(file);

    displayTestImage(img, file.name);

    const tensor = imageToTensor(img);
    const prediction = model.predict(tensor);
    const values = await prediction.data();

    tensor.dispose();
    prediction.dispose();

    const results = classNames.map((className, index) => ({
        className: className,
        probability: values[index]
    }));

    results.sort((a, b) => b.probability - a.probability);

    displayPredictionResults(results);
}



function displayTestImage(img, fileName) {

    const preview = document.getElementById("testPreview");

    preview.innerHTML = "";

    const previewImage = document.createElement("img");
    previewImage.src = img.src;
    previewImage.alt = fileName;

    const name = document.createElement("p");
    name.innerText = `Gambar uji: ${fileName}`;

    preview.appendChild(previewImage);
    preview.appendChild(name);
}

function displayPredictionResults(results) {

    const resultContainer = document.getElementById("result");
    const highestResult = results[0];
    const confidence = highestResult.probability * 100;

    let confidenceMessage = "";

    if (confidence >= 80) {
        confidenceMessage = "Model memiliki tingkat keyakinan tinggi.";
    } else if (confidence >= 60) {
        confidenceMessage = "Model memiliki tingkat keyakinan sedang.";
    } else {
        confidenceMessage =
            "Tingkat keyakinan model rendah. Tambahkan atau perbaiki data pelatihan.";
    }

    let resultHTML = `
        <div class="main-prediction">
            <span class="result-label">Hasil Prediksi</span>

            <h2>${highestResult.className}</h2>

            <p class="confidence-value">
                Tingkat keyakinan:
                <strong>${confidence.toFixed(2)}%</strong>
            </p>

            <p class="confidence-message">
                ${confidenceMessage}
            </p>
        </div>

        <div class="all-predictions">
            <h4>Persentase Setiap Kelas</h4>
    `;

    results.forEach(result => {

        const percentage = result.probability * 100;

        resultHTML += `
            <div class="prediction-item">

                <div class="prediction-info">
                    <span>${result.className}</span>
                    <strong>${percentage.toFixed(2)}%</strong>
                </div>

                <div class="prediction-bar">
                    <div class="prediction-progress"
                        style="width: ${percentage}%">
                    </div>
                </div>

            </div>
        `;
    });

    resultHTML += `
        </div>

        <p class="prediction-note">
            Persentase menunjukkan tingkat keyakinan model terhadap
            masing-masing kelas, bukan ukuran kepastian mutlak.
        </p>
    `;

    resultContainer.innerHTML = resultHTML;
}

function addClass() {

    const container = document.getElementById("classContainer");
    const classCount = container.children.length + 1;

    const box = document.createElement("div");

    box.className = "upload-box";

    box.innerHTML = `
        <button type="button"
            class="delete-class-btn"
            onclick="removeClass(this)">
            ×
        </button>

        <div class="class-header">
            <label>Kelas ${classCount}</label>
            <span class="class-badge">Dataset ${classCount}</span>
        </div>

        <input type="text"
            class="class-name"
            placeholder="Contoh: Nama objek">

        <label class="input-label">Masukkan data gambar</label>

        <input type="file"
            class="class-images"
            multiple
            accept="image/*">

        <p class="image-count">Belum ada gambar</p>

        <div class="image-preview"></div>
    `;

    container.appendChild(box);
    resetModel();
}


function removeClass(button) {

    let card = button.closest(".upload-box");

    card.remove();

    updateClassNumbers();

}

function updateClassNumbers() {

    const classes = document.querySelectorAll(
        "#classContainer .upload-box"
    );

    classes.forEach((card, index) => {

        const label = card.querySelector(".class-header label");
        const badge = card.querySelector(".class-badge");

        if (label) {
            label.innerText = `Kelas ${index + 1}`;
        }

        if (badge) {
            badge.innerText = `Dataset ${index + 1}`;
        }

    });

}

document.addEventListener("DOMContentLoaded", function () {

    const guideModal = document.getElementById("guideModal");

    if (guideModal) {
        document.body.appendChild(guideModal);
    }

});