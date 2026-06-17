let totalBenar = 0;
let totalDijawab = 0;
const KKM = 75;

function checkOutput(button, selected) {
  const question = button.closest(".ai-question");
  const correct = question.dataset.answer;
  const feedback = question.querySelector(".ai-feedback");

  if (question.dataset.done === "true") return;
  question.dataset.done = "true";

  question.querySelectorAll("button").forEach(btn => {
    btn.disabled = true;
    btn.style.opacity = "0.6";
  });

  totalDijawab++;

  if (selected === correct) {
    totalBenar++;
    button.style.background = "#22c55e";
    button.style.color = "#000";
    feedback.innerHTML = "✅ Benar! Output AI sesuai dengan input.";
    feedback.style.color = "#22c55e";
  } else {
    button.style.background = "#ef4444";
    button.style.color = "#fff";
    feedback.innerHTML = `❌ Salah. Output yang benar adalah <strong>${correct}</strong>.`;
    feedback.style.color = "#ef4444";
  }
}

document.getElementById("formSelesai").addEventListener("submit", function(e) {
  const totalSoal = document.querySelectorAll(".ai-question").length;
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

  scoreInfo.innerHTML = `✅ Nilai kamu ${nilai}. Materi selesai.`;
  scoreInfo.style.color = "#22c55e";
});

document.addEventListener("DOMContentLoaded", function () {

  const btnSelesai = document.getElementById("btnSelesai");

  // jika aktivitas sudah selesai
  if (btnSelesai.innerText.trim() === "Aktivitas Selesai") {

    document.querySelectorAll(".ai-question button").forEach(btn => {
      btn.disabled = true;
      btn.style.opacity = "0.6";
    });

  }

});