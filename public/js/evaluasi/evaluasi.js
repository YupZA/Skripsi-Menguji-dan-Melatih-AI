function submitQuiz() {
    const answers = {
        q1: "b",
        q2: "b",
        q3: "a",
        q4: "c",
        q5: "c",
        q6: "b",
        q7: "b",
        q8: "c",
        q9: "c",
        q10: "c",
        q11: "b",
        q12: "b",
        q13: "b",
        q14: "c",
        q15: "b",
        q16: "a",
        q17: "b",
        q18: "c",
        q19: "b",
        q20: "b",
        q21: "c",
        q22: "b",
        q23: "b",
        q24: "b",
        q25: "b",
        q26: "b",
        q27: "c",
        q28: "b",
        q29: "b",
        q30: "b",
    };

    let score = 0;
    let total = Object.keys(answers).length;

    for (let key in answers) {
        const selected = document.querySelector(`input[name="${key}"]:checked`);
        if (selected && selected.value === answers[key]) {
            score++;
        }
    }

    const nilai = Math.round((score / total) * 100);
    const lulus = nilai >= 75;

    // kunci kuis
    document
        .querySelector(".quiz-section")
        .classList.add("quiz-locked");

    let html = `
        <h3>Hasil Kuis</h3>
        <p>Jawaban benar: <strong>${score}</strong> dari ${total}</p>
        <p>Nilai: <strong>${nilai}</strong></p>
    `;

    if (lulus) {
        html += `
            <p class="text-success fw-bold">✅ LULUS</p>
            <p>Selamat! Kamu sudah menyelesaikan semua pelajaran ini.</p>

            <a href="/bab-1/bab-1-materi-a" class="btn btn-success mt-3">
                ➡️ Belajar Lagi
            </a>
        `;
    } else {
        html += `
            <p class="text-danger fw-bold">❌ BELUM LULUS</p>
            <p>Silakan ulangi materi atau coba evaluasi kembali.</p>

            <div class="d-flex gap-2 mt-3">
                <a href="/bab-1/bab-1-materi-a" class="btn btn-outline-info">
                    🔁 Ulangi Materi
                </a>

                <button class="btn btn-warning" onclick="resetQuiz()">
                    ▶️ Coba Lagi
                </button>
            </div>
        `;
    }

    document.getElementById("quizResult").innerHTML = html;
    document.getElementById("quizResult").style.display = "block";

}

function resetQuiz() {
    // buka kuis
    document
        .querySelector(".quiz-section")
        .classList.remove("quiz-locked");

    // reset pilihan
    document.querySelectorAll('input[type="radio"]').forEach(r => {
        r.checked = false;
    });

    // hapus hasil
    document.getElementById("quizResult").innerHTML = "";

    // kembali ke atas  (otomatis scroll ke atas)
    window.scrollTo({
        top: document.querySelector(".quiz-section")?.offsetTop || 0,
        behavior: "smooth"
    });

    const resultBox = document.getElementById("quizResult");
    resultBox.innerHTML = "";
    resultBox.style.display = "none";

}
