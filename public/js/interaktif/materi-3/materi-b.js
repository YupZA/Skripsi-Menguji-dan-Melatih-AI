let totalBenar = 0;
let totalDijawab = 0;
const KKM = 75;

function checkBS(btn, pilihan) {
    const box = btn.closest(".ai-question");
    const jawaban = box.dataset.answer;
    const feedback = box.querySelector(".ai-feedback");

    if (box.dataset.done === "true") return;
    box.dataset.done = "true";

    box.querySelectorAll("button").forEach(b => {
        b.disabled = true;
        b.style.opacity = "0.6";
    });

    totalDijawab++;

    if (pilihan === jawaban) {
        totalBenar++;
        btn.style.background = "#22c55e";
        btn.style.color = "#000";
        feedback.innerHTML = "✅ Benar";
        feedback.style.color = "#22c55e";
    } else {
        btn.style.background = "#ef4444";
        btn.style.color = "#fff";
        feedback.innerHTML = `❌ Salah. Jawaban yang benar adalah <strong>${jawaban}</strong>.`;
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

    scoreInfo.innerHTML = `✅ Nilai kamu ${nilai}. Aktivitas selesai.`;
    scoreInfo.style.color = "#22c55e";
});

document.addEventListener("DOMContentLoaded", function () {
    const btnSelesai = document.getElementById("btnSelesai");

    if (btnSelesai && btnSelesai.innerText.trim() === "Aktivitas Selesai") {
        document.querySelectorAll(".ai-question button").forEach(btn => {
            btn.disabled = true;
            btn.style.opacity = "0.6";
        });
    }
});