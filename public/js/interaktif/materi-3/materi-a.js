let totalBenar = 0;
let totalDijawab = 0;
const KKM = 75;

function checkDebug(button, choice) {
    const card = button.closest(".debug-card");
    const correct = card.dataset.answer;
    const feedback = card.querySelector(".debug-feedback");
    const buttons = card.querySelectorAll("button");

    if (card.dataset.done === "true") return;
    card.dataset.done = "true";

    buttons.forEach(btn => {
        btn.disabled = true;
        btn.style.opacity = "0.6";
    });

    totalDijawab++;

    if (choice === correct) {
        totalBenar++;
        button.classList.add("correct");
        feedback.innerHTML = "✅ Jawaban benar! Analisis kamu tepat.";
        feedback.classList.add("success");
    } else {
        button.classList.add("wrong");
        feedback.innerHTML = "❌ Kurang tepat. Perhatikan kembali penyebab kesalahan model AI.";
        feedback.classList.add("error");

        buttons.forEach(btn => {
            if (btn.getAttribute("onclick").includes(`'${correct}'`)) {
                btn.classList.add("correct-outline");
            }
        });
    }
}

document.getElementById("formSelesai").addEventListener("submit", function(e) {
    const totalSoal = document.querySelectorAll(".debug-card").length;
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
        document.querySelectorAll(".debug-card button").forEach(btn => {
            btn.disabled = true;
            btn.style.opacity = "0.6";
        });
    }
});