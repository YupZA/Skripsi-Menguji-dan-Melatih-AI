let totalBenar = 0;
let totalDijawab = 0;

const KKM = 75;

/**
 * Memeriksa jawaban benar atau salah.
 */
function checkBS(button, pilihan) {
    const question = button.closest(".ai-question");
    const jawaban = question.dataset.answer;
    const feedback = question.querySelector(".ai-feedback");
    const buttons = question.querySelectorAll(".ai-options button");

    if (question.dataset.done === "true") {
        return;
    }

    question.dataset.done = "true";

    buttons.forEach((optionButton) => {
        optionButton.disabled = true;
        optionButton.style.opacity = "0.6";

        optionButton.classList.remove(
            "correct",
            "wrong",
            "correct-outline"
        );

        const optionValue =
            optionButton.textContent
                .trim()
                .toLowerCase();

        /*
         * Tampilkan jawaban yang benar.
         */
        if (optionValue === jawaban) {
            optionButton.classList.add("correct-outline");
        }
    });

    totalDijawab++;

    if (pilihan === jawaban) {
        totalBenar++;

        button.classList.remove("correct-outline");
        button.classList.add("correct");

        feedback.innerHTML =
            "✅ Benar! Pernyataan telah kamu identifikasi dengan tepat.";

        feedback.className =
            "ai-feedback feedback-correct";
    } else {
        button.classList.add("wrong");

        feedback.innerHTML =
            `❌ Jawaban kurang tepat. Jawaban yang benar adalah ` +
            `<strong>${formatTrueFalseAnswer(jawaban)}</strong>.`;

        feedback.className =
            "ai-feedback feedback-wrong";
    }
}

/**
 * Mengubah nilai jawaban menjadi teks yang rapi.
 */
function formatTrueFalseAnswer(answer) {
    return answer === "benar"
        ? "Benar"
        : "Salah";
}

/**
 * Menangani pengumpulan aktivitas.
 */
document.addEventListener("DOMContentLoaded", function () {
    const form =
        document.getElementById("formSelesai");

    const submitButton =
        document.getElementById("btnSelesai");

    if (!form || !submitButton) {
        return;
    }

    form.addEventListener("submit", function (event) {
        const totalSoal =
            document.querySelectorAll(".ai-question").length;

        const nilai =
            totalSoal > 0
                ? Math.round((totalBenar / totalSoal) * 100)
                : 0;

        const scoreInfo =
            document.getElementById("scoreInfo");

        const isCompleted =
            submitButton.dataset.completed === "true";

        if (totalDijawab < totalSoal) {
            event.preventDefault();

            scoreInfo.textContent =
                "❌ Semua soal harus dijawab terlebih dahulu.";

            scoreInfo.className =
                "score-info score-error";

            return;
        }

        /*
         * Jika materi sudah pernah selesai,
         * pengerjaan hanya dianggap latihan.
         */
        if (isCompleted) {
            event.preventDefault();

            if (nilai >= KKM) {
                scoreInfo.textContent =
                    `✅ Nilai latihan kamu ${nilai}. ` +
                    `Kamu telah mencapai KKM ${KKM}. ` +
                    "Penyelesaian materi sebelumnya tidak berubah.";

                scoreInfo.className =
                    "score-info score-success";
            } else {
                scoreInfo.textContent =
                    `Nilai latihan kamu ${nilai}. ` +
                    `Belum mencapai KKM ${KKM}. ` +
                    "Penyelesaian materi sebelumnya tetap tersimpan.";

                scoreInfo.className =
                    "score-info score-warning";
            }

            return;
        }

        /*
         * Pengerjaan pertama harus mencapai KKM.
         */
        if (nilai < KKM) {
            event.preventDefault();

            scoreInfo.textContent =
                `❌ Nilai kamu ${nilai}. ` +
                `Belum mencapai KKM ${KKM}. ` +
                "Silakan ulangi aktivitas.";

            scoreInfo.className =
                "score-info score-error";

            return;
        }

        scoreInfo.textContent =
            `✅ Nilai kamu ${nilai}. ` +
            "Aktivitas selesai dan progres akan disimpan.";

        scoreInfo.className =
            "score-info score-success";
    });
});

/**
 * Mengembalikan aktivitas ke kondisi awal.
 */
function resetTrueFalseActivity() {
    totalBenar = 0;
    totalDijawab = 0;

    document.querySelectorAll(".ai-question").forEach((question) => {
        delete question.dataset.done;

        const buttons =
            question.querySelectorAll(".ai-options button");

        const feedback =
            question.querySelector(".ai-feedback");

        buttons.forEach((button) => {
            button.disabled = false;
            button.style.opacity = "1";
            button.style.background = "";
            button.style.color = "";

            button.classList.remove(
                "correct",
                "wrong",
                "correct-outline"
            );
        });

        if (feedback) {
            feedback.innerHTML = "";
            feedback.className = "ai-feedback";
        }
    });

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (scoreInfo) {
        scoreInfo.textContent = "";
        scoreInfo.className = "score-info";
    }

    document.querySelector(".ai-interactive")
        ?.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
}