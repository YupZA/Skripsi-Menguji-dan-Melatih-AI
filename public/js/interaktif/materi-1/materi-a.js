let totalBenar = 0;
let totalDijawab = 0;
const KKM = 75;

function checkAnswer(button, selected) {
    const question = button.closest(".ai-question");
    const correct = question.dataset.answer;
    const buttons = question.querySelectorAll("button");
    const feedback = question.querySelector(".ai-feedback");

    if (question.dataset.done === "true") return;
    question.dataset.done = "true";

    buttons.forEach(btn => {
        btn.disabled = true;
        btn.style.opacity = "0.6";

        const btnValue = btn.textContent.toLowerCase().includes("program")
            ? "program"
            : "ai";

        if (btnValue === correct) {
            btn.classList.add("btn-correct");
        }

        if (btn === button && selected !== correct) {
            btn.classList.add("btn-wrong");
        }
    });

    totalDijawab++;

    if (selected === correct) {
        totalBenar++;
        feedback.textContent = "✅ Jawaban benar!";
        feedback.classList.add("feedback-correct");
    } else {
        feedback.textContent = "❌ Jawaban kurang tepat.";
        feedback.classList.add("feedback-wrong");
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