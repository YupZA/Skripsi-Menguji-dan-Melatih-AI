let totalBenar = 0;
let totalDijawab = 0;

const KKM = 75;

/**
 * Memeriksa jawaban analisis siswa.
 */
function checkDebug(button, choice) {
    const card = button.closest(".debug-card");
    const correct = card.dataset.answer;
    const feedback = card.querySelector(".debug-feedback");
    const buttons = card.querySelectorAll(".debug-options button");

    if (card.dataset.done === "true") {
        return;
    }

    card.dataset.done = "true";

    buttons.forEach((optionButton) => {
        optionButton.disabled = true;
        optionButton.style.opacity = "0.6";

        optionButton.classList.remove(
            "correct",
            "wrong",
            "correct-outline"
        );

        const optionValue =
            getDebugChoice(optionButton);

        if (optionValue === correct) {
            optionButton.classList.add("correct-outline");
        }
    });

    totalDijawab++;

    if (choice === correct) {
        totalBenar++;

        button.classList.remove("correct-outline");
        button.classList.add("correct");

        feedback.innerHTML =
            "✅ Jawaban benar! Analisis kamu sudah tepat.";

        feedback.className =
            "debug-feedback feedback-correct";
    } else {
        button.classList.add("wrong");

        feedback.innerHTML =
            "❌ Jawaban kurang tepat. Perhatikan kembali penyebab kesalahan model kecerdasan buatan.";

        feedback.className =
            "debug-feedback feedback-wrong";
    }
}

/**
 * Mengambil nilai jawaban dari atribut onclick.
 */
function getDebugChoice(button) {
    const onclickValue =
        button.getAttribute("onclick") || "";

    const match =
        onclickValue.match(/checkDebug\s*\(\s*this\s*,\s*['"]([^'"]+)['"]\s*\)/);

    return match ? match[1] : "";
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
            document.querySelectorAll(".debug-card").length;

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
         * Materi telah diselesaikan.
         * Nilai sekarang hanya digunakan sebagai latihan.
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
function resetDebugActivity() {
    totalBenar = 0;
    totalDijawab = 0;

    document.querySelectorAll(".debug-card").forEach((card) => {
        delete card.dataset.done;

        const buttons =
            card.querySelectorAll(".debug-options button");

        const feedback =
            card.querySelector(".debug-feedback");

        buttons.forEach((button) => {
            button.disabled = false;
            button.style.opacity = "1";

            button.classList.remove(
                "correct",
                "wrong",
                "correct-outline"
            );
        });

        if (feedback) {
            feedback.innerHTML = "";
            feedback.className = "debug-feedback";
        }
    });

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (scoreInfo) {
        scoreInfo.textContent = "";
        scoreInfo.className = "score-info";
    }

    document.querySelector(".ai-debug")
        ?.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
}