let totalBenar = 0;
let totalDijawab = 0;

const KKM = 75;

/**
 * Memeriksa jawaban output yang dipilih siswa.
 */
function checkOutput(button, selected) {
    const question = button.closest(".ai-question");
    const correct = question.dataset.answer;
    const feedback = question.querySelector(".ai-feedback");

    const explanation =
        question.dataset.explain ||
        "Output kecerdasan buatan ditentukan berdasarkan pola dari input yang diberikan.";

    if (question.dataset.done === "true") {
        return;
    }

    question.dataset.done = "true";

    const buttons =
        question.querySelectorAll(".ai-options button");

    buttons.forEach((optionButton) => {
        optionButton.disabled = true;
        optionButton.style.opacity = "0.6";

        optionButton.classList.remove(
            "correct",
            "wrong"
        );

        const optionValue = getOptionValue(optionButton);

        /*
         * Menampilkan pilihan yang benar,
         * meskipun siswa memilih jawaban salah.
         */
        if (optionValue === correct) {
            optionButton.classList.add("correct");
        }
    });

    totalDijawab++;

    if (selected === correct) {
        totalBenar++;

        feedback.innerHTML =
            `✅ Benar! ${explanation}`;

        feedback.className =
            "ai-feedback feedback-correct";
    } else {
        button.classList.add("wrong");

        feedback.innerHTML =
            `❌ Jawaban kurang tepat. ` +
            `Output yang benar adalah <strong>${formatAnswer(correct)}</strong>. ` +
            explanation;

        feedback.className =
            "ai-feedback feedback-wrong";
    }

    updateProgress();
}

/**
 * Mengambil nilai jawaban berdasarkan teks tombol.
 */
function getOptionValue(button) {
    return button.textContent
        .trim()
        .toLowerCase();
}

/**
 * Merapikan teks jawaban untuk feedback.
 */
function formatAnswer(answer) {
    return answer
        .split(" ")
        .map((word) => {
            return word.charAt(0).toUpperCase() +
                word.slice(1);
        })
        .join(" ");
}

/**
 * Memperbarui progres pengerjaan.
 */
function updateProgress() {
    const totalSoal =
        document.querySelectorAll(".ai-question").length;

    const progressText =
        document.getElementById("progressText");

    const progressBar =
        document.getElementById("progressBar");

    if (progressText) {
        progressText.textContent =
            `${totalDijawab}/${totalSoal} soal dijawab`;
    }

    if (progressBar) {
        const persen =
            totalSoal > 0
                ? (totalDijawab / totalSoal) * 100
                : 0;

        progressBar.style.width = `${persen}%`;
    }
}

/**
 * Menangani proses pengumpulan aktivitas.
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

        const scoreInfo =
            document.getElementById("scoreInfo");

        const isCompleted =
            submitButton.dataset.completed === "true";

        const nilai =
            totalSoal > 0
                ? Math.round((totalBenar / totalSoal) * 100)
                : 0;

        if (totalDijawab < totalSoal) {
            event.preventDefault();

            scoreInfo.textContent =
                "❌ Semua soal harus dijawab terlebih dahulu.";

            scoreInfo.className =
                "score-info score-error";

            return;
        }

        /*
         * Materi sudah pernah diselesaikan.
         * Nilai ini hanya digunakan sebagai latihan.
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

    updateProgress();
});

/**
 * Mengembalikan aktivitas ke kondisi awal.
 */
function resetOutputActivity() {
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
                "wrong"
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

    updateProgress();

    document.querySelector(".ai-inline-interactive")
        ?.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
}