function submitQuiz() {
    const answers = {
        q1: "a",
        q2: "b",
        q3: "b",
        q4: "b",
        q5: "c",
        q6: "b",
        q7: "c",
        q8: "a",
        q9: "c",
        q10: "c",
        
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
    const lulus = nilai >= 70;

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
            <p>Selamat! Kamu dapat melanjutkan ke materi berikutnya.</p>

            <a href="/bab-3/bab-3-materi-a" class="btn btn-success mt-3">
                ➡️ Lanjut ke Bab 3
            </a>
        `;
    } else {
        html += `
            <p class="text-danger fw-bold">❌ BELUM LULUS</p>
            <p>Silakan ulangi materi atau coba kuis kembali.</p>

            <div class="d-flex gap-2 mt-3">
                <a href="/bab-2/bab-2-materi-a" class="btn btn-outline-info">
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
