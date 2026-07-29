let totalBenar = 0;
let totalDijawab = 0;

const KKM = 75;

/**
 * Memeriksa pilihan klasifikasi siswa.
 */
function classify(button, choice) {
    const item = button.closest(".classify-item");
    const correct = item.dataset.answer;
    const feedback = item.querySelector(".feedback");
    const buttons = item.querySelectorAll("button");

    if (item.dataset.done === "true") {
        return;
    }

    item.dataset.done = "true";

    buttons.forEach((optionButton) => {
        optionButton.disabled = true;
        optionButton.style.opacity = "0.6";

        optionButton.classList.remove(
            "correct",
            "wrong"
        );

        const optionValue =
            getClassificationValue(optionButton);

        /*
         * Tampilkan pilihan yang benar,
         * meskipun siswa memilih jawaban salah.
         */
        if (optionValue === correct) {
            optionButton.classList.add("correct");
        }
    });

    totalDijawab++;

    if (choice === correct) {
        totalBenar++;

        feedback.innerHTML =
            `✅ Benar! Ini termasuk <strong>${formatClassification(correct)}</strong>.`;

        feedback.className =
            "feedback feedback-correct";
    } else {
        button.classList.add("wrong");

        feedback.innerHTML =
            `❌ Jawaban kurang tepat. Jawaban yang benar adalah ` +
            `<strong>${formatClassification(correct)}</strong>.`;

        feedback.className =
            "feedback feedback-wrong";
    }
}

/**
 * Mengambil nilai klasifikasi berdasarkan teks tombol.
 */
function getClassificationValue(button) {
    const text = button.textContent
        .trim()
        .toLowerCase();

    return text.includes("kecerdasan")
        ? "ai"
        : "program";
}

/**
 * Mengubah nilai data menjadi teks yang ditampilkan.
 */
function formatClassification(value) {
    return value === "ai"
        ? "Kecerdasan Buatan"
        : "Program Biasa";
}

/**
 * Mengatur proses pengumpulan aktivitas.
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
            document.querySelectorAll(".classify-item").length;

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
         * hasil hanya dianggap latihan.
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
 * Mengembalikan aktivitas klasifikasi ke kondisi awal.
 */
function resetClassificationActivity() {
    totalBenar = 0;
    totalDijawab = 0;

    document.querySelectorAll(".classify-item").forEach((item) => {
        delete item.dataset.done;

        const buttons =
            item.querySelectorAll("button");

        const feedback =
            item.querySelector(".feedback");

        buttons.forEach((button) => {
            button.disabled = false;
            button.style.opacity = "1";

            button.classList.remove(
                "correct",
                "wrong"
            );
        });

        if (feedback) {
            feedback.innerHTML = "";
            feedback.className = "feedback";
        }
    });

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (scoreInfo) {
        scoreInfo.textContent = "";
        scoreInfo.className = "score-info";
    }

    document.querySelector(".ai-classification")
        ?.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
}