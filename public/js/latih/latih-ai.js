let model, webcam;

const modelInput = document.getElementById("trainAiModelInput");
const inputContainer = document.getElementById("trainAiPreviewArea");
const labelContainer = document.getElementById("trainAiResultArea");

document.getElementById("trainAiLoadModelBtn").onclick = loadModel;
document.getElementById("trainAiCameraBtn").onclick = startWebcam;
document.getElementById("trainAiUploadBtn").onclick = triggerUpload;
document.getElementById("trainAiAudioBtn").onclick = triggerAudioUpload;

document
  .getElementById("trainAiImageFile")
  .addEventListener("change", handleImage);

document
  .getElementById("trainAiAudioFile")
  .addEventListener("change", handleAudio);


/* =========================
   LOAD MODEL
========================= */
async function loadModel() {
  let base = modelInput.value.trim();
  if (!base.endsWith("/")) base += "/";

  if (!base.includes("teachablemachine.withgoogle.com/models/")) {
    alert("Gunakan link dari Google Teachable Machine!");
    return;
  }

  try {
    model = await tmImage.load(
      base + "model.json",
      base + "metadata.json"
    );

    labelContainer.innerHTML = `
      <p>Model berhasil dimuat</p>
      <small>Jumlah kelas: ${model.getTotalClasses()}</small>
    `;
  } catch (e) {
    alert("Link model tidak valid atau belum di-export (TensorFlow.js)");
    console.error(e);
  }
}

/* =========================
   CAMERA
========================= */
async function startWebcam() {
  if (!model) return alert("Load model dulu!");

  webcam = new tmImage.Webcam(240, 240, true);
  await webcam.setup();
  await webcam.play();

  inputContainer.innerHTML = "";
  inputContainer.appendChild(webcam.canvas);

  window.requestAnimationFrame(loop);
}

async function loop() {
  webcam.update();
  await predict(webcam.canvas);
  window.requestAnimationFrame(loop);
}

/* =========================
   UPLOAD IMAGE
========================= */
function triggerUpload() {
  if (!model) return alert("Load model dulu!");
  document.getElementById("trainAiImageFile").click();
}

function handleImage(e) {
  const file = e.target.files[0];
  if (!file || !model) return;

  const img = document.createElement("img");
  img.src = URL.createObjectURL(file);
  img.style.maxWidth = "240px";

  img.onload = async () => {
    inputContainer.innerHTML = "";
    inputContainer.appendChild(img);
    await predict(img);
  };
}

/* =========================
UPLOAD AUDIO (AUDIO MODEL)
========================= */
function triggerAudioUpload() {
  if (!model) return alert("Load model dulu!");
  document.getElementById("trainAiAudioFile").click();
}


async function handleAudio(e) {
  const file = e.target.files[0];
  if (!file || !model) return;


  // tampilkan audio player
  const audio = document.createElement("audio");
  audio.controls = true;
  audio.src = URL.createObjectURL(file);


  inputContainer.innerHTML = "";
  inputContainer.appendChild(audio);


  // decode audio
  const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
  const buffer = await file.arrayBuffer();
  const audioBuffer = await audioCtx.decodeAudioData(buffer);


  try {
    const predictions = await model.predict(audioBuffer);


    labelContainer.innerHTML = "<h4>Hasil Prediksi Audio</h4>";
    predictions.forEach(p => {
      const div = document.createElement("div");
      div.innerHTML = `
${p.className} :
<strong>${(p.probability * 100).toFixed(1)}%</strong>
`;
      labelContainer.appendChild(div);
    });
  } catch (err) {
    alert("Model ini bukan model Audio.");
    console.error(err);
  }
}

/* =========================
   PREDICTION
========================= */
async function predict(input) {
  const predictions = await model.predict(input);
  labelContainer.innerHTML = "<h4>Hasil Prediksi</h4>";

  predictions.forEach(p => {
    const div = document.createElement("div");
    div.innerHTML = `
      ${p.className} :
      <strong>${(p.probability * 100).toFixed(1)}%</strong>
    `;
    labelContainer.appendChild(div);
  });
}