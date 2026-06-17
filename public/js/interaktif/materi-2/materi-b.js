let totalBenar = 0;
let totalDijawab = 0;
const KKM = 75;

function classify(button, choice) {
  const item = button.closest(".classify-item");
  const correct = item.dataset.answer;
  const feedback = item.querySelector(".feedback");
  const buttons = item.querySelectorAll("button");

  if (item.dataset.done === "true") return;
  item.dataset.done = "true";

  buttons.forEach(btn => {
    btn.disabled = true;
    btn.style.opacity = "0.6";
  });

  totalDijawab++;

  if (choice === correct) {
    totalBenar++;
    button.classList.add("correct");

    if (correct === "ai") {
      feedback.innerHTML = "✅ Benar! Ini termasuk <strong>Kecerdasan Buatan</strong>.";
    } else {
      feedback.innerHTML = "✅ Benar! Ini termasuk <strong>Program Biasa</strong>.";
    }
  } else {
    button.classList.add("wrong");

    if (correct === "ai") {
      feedback.innerHTML = "❌ Salah. Jawaban yang benar adalah <strong>Kecerdasan Buatan</strong>.";
    } else {
      feedback.innerHTML = "❌ Salah. Jawaban yang benar adalah <strong>Program Biasa</strong>.";
    }
  }
}

document.getElementById("formSelesai").addEventListener("submit", function(e) {
  const totalSoal = document.querySelectorAll(".classify-item").length;
  const nilai = Math.round((totalBenar / totalSoal) * 100);
  const scoreInfo = document.getElementById("scoreInfo");

  if (totalDijawab < totalSoal) {
    e.preventDefault();
    scoreInfo.innerHTML = "❌ Semua soal harus dijawab terlebih dahulu.";
    scoreInfo.style.color = "#ef4444";
    return;
  }

  if (nilai < KKM) {
    e.preventDefault();
    scoreInfo.innerHTML = `❌ Nilai kamu ${nilai}. Belum mencapai KKM ${KKM}. Materi belum selesai.`;
    scoreInfo.style.color = "#ef4444";
    return;
  }

  scoreInfo.innerHTML = `✅ Nilai kamu ${nilai}. Aktivitas selesai.`;
  scoreInfo.style.color = "#22c55e";
});

document.addEventListener("DOMContentLoaded", function () {
  const btnSelesai = document.getElementById("btnSelesai");

  if (btnSelesai && btnSelesai.innerText.trim() === "Aktivitas Selesai") {
    document.querySelectorAll(".classify-item button").forEach(btn => {
      btn.disabled = true;
      btn.style.opacity = "0.6";
    });
  }
});