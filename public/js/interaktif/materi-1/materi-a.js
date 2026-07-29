let totalBenar = 0;
let totalDijawab = 0;

const KKM = 75;

/**
 * Memeriksa jawaban yang dipilih siswa.
 */
function checkAnswer(button, selected) {
    const question = button.closest(".ai-question");
    const correct = question.dataset.answer;
    const buttons = question.querySelectorAll(".ai-options button");
    const feedback = question.querySelector(".ai-feedback");

    // Satu soal hanya dapat dijawab sekali
    // sebelum aktivitas direset.
    if (question.dataset.done === "true") {
        return;
    }

    question.dataset.done = "true";

    buttons.forEach((btn) => {
        btn.disabled = true;
        btn.style.opacity = "0.6";

        const btnValue = btn.textContent
            .toLowerCase()
            .includes("program")
            ? "program"
            : "ai";

        // Tandai jawaban yang benar
        if (btnValue === correct) {
            btn.classList.add("btn-correct");
        }

        // Tandai pilihan siswa yang salah
        if (btn === button && selected !== correct) {
            btn.classList.add("btn-wrong");
        }
    });

    totalDijawab++;

    if (selected === correct) {
        totalBenar++;

        feedback.textContent = "✅ Jawaban benar!";
        feedback.classList.remove("feedback-wrong");
        feedback.classList.add("feedback-correct");
    } else {
        feedback.textContent = "❌ Jawaban kurang tepat.";
        feedback.classList.remove("feedback-correct");
        feedback.classList.add("feedback-wrong");
    }
}

/**
 * Memeriksa kelengkapan jawaban dan nilai siswa
 * sebelum aktivitas dikumpulkan.
 */
document.addEventListener("DOMContentLoaded", function () {
    const formSelesai = document.getElementById("formSelesai");
    const btnSelesai = document.getElementById("btnSelesai");

    if (!formSelesai || !btnSelesai) {
        return;
    }

    const isCompleted =
        btnSelesai.dataset.completed === "true";

    formSelesai.addEventListener("submit", function (event) {
        const totalSoal =
            document.querySelectorAll(".ai-question").length;

        const nilai = Math.round(
            (totalBenar / totalSoal) * 100
        );

        const scoreInfo =
            document.getElementById("scoreInfo");

        if (totalDijawab < totalSoal) {
            event.preventDefault();

            scoreInfo.innerHTML =
                "❌ Semua soal harus dijawab terlebih dahulu.";

            scoreInfo.style.color = "#ef4444";
            return;
        }

        // Materi sudah pernah selesai:
        // pengerjaan hanya dianggap latihan ulang.
        if (isCompleted) {
            event.preventDefault();

            if (nilai >= KKM) {
                scoreInfo.innerHTML =
                    `✅ Nilai latihan kamu ${nilai}. ` +
                    `Kamu telah mencapai KKM ${KKM}. ` +
                    "Nilai penyelesaian sebelumnya tidak berubah.";

                scoreInfo.style.color = "#22c55e";
            } else {
                scoreInfo.innerHTML =
                    `📘 Nilai latihan kamu ${nilai}. ` +
                    `Belum mencapai KKM ${KKM}, tetapi progres ` +
                    "materi sebelumnya tetap tersimpan.";

                scoreInfo.style.color = "#f59e0b";
            }

            return;
        }

        // Pengerjaan pertama
        if (nilai < KKM) {
            event.preventDefault();

            scoreInfo.innerHTML =
                `❌ Nilai kamu ${nilai}. ` +
                `Belum mencapai KKM ${KKM}. ` +
                "Silakan ulangi aktivitas.";

            scoreInfo.style.color = "#ef4444";
            return;
        }

        scoreInfo.innerHTML =
            `✅ Nilai kamu ${nilai}. ` +
            "Aktivitas selesai dan progres akan disimpan.";

        scoreInfo.style.color = "#22c55e";
    });
});

/**
 * Mengembalikan aktivitas ke kondisi awal agar
 * dapat dikerjakan kembali.
 */
function resetActivity() {
    totalBenar = 0;
    totalDijawab = 0;

    const questions =
        document.querySelectorAll(".ai-question");

    questions.forEach((question) => {
        delete question.dataset.done;

        const buttons =
            question.querySelectorAll(".ai-options button");

        const feedback =
            question.querySelector(".ai-feedback");

        buttons.forEach((button) => {
            button.disabled = false;
            button.style.opacity = "1";

            button.classList.remove(
                "btn-correct",
                "btn-wrong"
            );
        });

        if (feedback) {
            feedback.textContent = "";

            feedback.classList.remove(
                "feedback-correct",
                "feedback-wrong"
            );
        }
    });

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (scoreInfo) {
        scoreInfo.innerHTML = "";
        scoreInfo.style.color = "";
    }
}