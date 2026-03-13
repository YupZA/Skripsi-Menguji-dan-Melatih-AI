console.log("TensorFlow:", typeof tf);

let model;

let catImages = [];
let notCatImages = [];

document.addEventListener("change", function (e) {

    if (e.target.classList.contains("class-images")) {

        let count = e.target.files.length;

        e.target.parentElement.querySelector(".image-count").innerText =
            count + " gambar";

    }

});

async function loadImage(file) {

    return new Promise(resolve => {
        let img = new Image();
        img.src = URL.createObjectURL(file);
        img.onload = () => resolve(img);
    });

}

function imageToTensor(img) {

    return tf.browser.fromPixels(img)
        .resizeNearestNeighbor([64, 64])
        .toFloat()
        .div(255)
        .expandDims();

}

async function trainModel() {

    let classes = document.querySelectorAll(".upload-box");

    let xs = [];
    let ys = [];

    document.getElementById("trainingStatus").innerText = "Menyiapkan dataset...";

    for (let i = 0; i < classes.length; i++) {

        let files = classes[i].querySelector(".class-images").files;

        for (let file of files) {

            let img = await loadImage(file);

            xs.push(imageToTensor(img));

            let label = new Array(classes.length).fill(0);
            label[i] = 1;

            ys.push(label);

        }

    }

    if (xs.length === 0) {
        alert("Masukkan dataset gambar terlebih dahulu!");
        return;
    }

    let xTensor = tf.concat(xs);
    let yTensor = tf.tensor(ys);

    model = tf.sequential();

    model.add(tf.layers.conv2d({
        filters: 16,
        kernelSize: 3,
        activation: 'relu',
        inputShape: [64, 64, 3]
    }));

    model.add(tf.layers.maxPooling2d({ poolSize: 2 }));

    model.add(tf.layers.flatten());

    model.add(tf.layers.dense({
        units: 64,
        activation: 'relu'
    }));

    model.add(tf.layers.dense({
        units: classes.length,
        activation: 'softmax'
    }));

    model.compile({
        optimizer: 'adam',
        loss: 'categoricalCrossentropy',
        metrics: ['accuracy']
    });

    document.getElementById("trainingStatus").innerText = "Training dimulai...";

    await model.fit(xTensor, yTensor, {
        epochs: 5,
        callbacks: {
            onEpochEnd: (epoch, logs) => {
                document.getElementById("trainingStatus").innerText =
                    "Epoch " + (epoch + 1) + " Loss:" + logs.loss.toFixed(4);
            }
        }
    });

    document.getElementById("trainingStatus").innerText = "Training selesai!";
}


async function predict() {

    if (!model) {
        alert("Model belum dilatih!");
        return;
    }

    let file = document.getElementById("testImage").files[0];

    if (!file) {
        alert("Masukkan gambar terlebih dahulu");
        return;
    }

    let img = await loadImage(file);

    let tensor = imageToTensor(img);

    let prediction = model.predict(tensor);

    let values = prediction.dataSync();

    let classes = document.querySelectorAll(".class-name");

    let maxIndex = values.indexOf(Math.max(...values));

    let className = classes[maxIndex].value;

    document.getElementById("result").innerText =
        "Prediksi: " + className + " (" + (values[maxIndex] * 100).toFixed(2) + "%)";
}


function addClass() {

    let container = document.getElementById("classContainer");

    let classCount = container.children.length + 1;

    let box = document.createElement("div");

    box.className = "upload-box";

    box.innerHTML = `
<button class="delete-class-btn" onclick="removeClass(this)">×</button>

<label>Class ${classCount}</label>

<input type="text" class="class-name" placeholder="Nama class">

<input type="file" class="class-images" multiple accept="image/*">

<p class="image-count">0 gambar</p>
`;

    container.appendChild(box);

}


function removeClass(button) {

    let card = button.closest(".upload-box");

    card.remove();

    updateClassNumbers();

}

function updateClassNumbers() {

    let classes = document.querySelectorAll("#classContainer .upload-box");

    classes.forEach((card, index) => {

        let label = card.querySelector("label");

        if (label) {
            label.innerText = "Class " + (index + 1);
        }

    });

}