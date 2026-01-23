let duration = 15 * 60; // detik
let endTime;
let timerInterval;
let quizSubmitted = false;

function renderTime(display, remaining) {
    const minutes = Math.floor(remaining / 60);
    const seconds = remaining % 60;

    display.textContent =
        String(minutes).padStart(2, "0") + ":" +
        String(seconds).padStart(2, "0");
}

function startTimer() {
    const display = document.getElementById("timeLeft");

    endTime = Date.now() + duration * 1000;

    // 🔹 RENDER AWAL (INI KUNCI UTAMA)
    renderTime(display, duration);

    timerInterval = setInterval(() => {

        if (quizSubmitted) {
            clearInterval(timerInterval);
            return;
        }

        const now = Date.now();
        const remaining = Math.ceil((endTime - now) / 1000);

        if (remaining <= 0) {
            clearInterval(timerInterval);
            renderTime(display, 0);
            submitQuiz(true);
            return;
        }

        renderTime(display, remaining);

        if (remaining <= 120) {
            document.querySelector(".quiz-timer")
                ?.classList.add("warning");
        }

    }, 1000);
}



function submitQuiz(auto = false) {
    if (quizSubmitted) return;
    quizSubmitted = true;
    clearInterval(timerInterval);
    lockQuiz();

    // SEMBUNYIKAN SOAL
    document.getElementById("quizQuestions").style.display = "none";

    // SEMBUNYIKAN TIMER
    document.querySelector(".quiz-timer")?.classList.add("d-none");

    // SEMBUNYIKAN navigator soal
    document.querySelector(".quiz-nav")?.classList.add("d-none");

    document.body.classList.add("quiz-finished");


    // ====== LOGIC PENILAIAN (punyamu tetap) ======
    const answers = {
        q1: "b",
        q2: "b",
        q3: "c",
        q4: "a",
        q5: "b",
        q6: "c",
        q7: "b",
        q8: "c",
        q9: "c",
        q10: "b",
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

    let html = `
        <h3>Hasil Kuis</h3>
        <p>Jawaban benar: <strong>${score}</strong> dari ${total}</p>
        <p>Nilai: <strong>${nilai}</strong></p>
    `;

    if (lulus) {
        html += `
            <p class="text-success fw-bold">LULUS</p>
            <a href="/bab-2/bab-2-materi-a" class="btn btn-success mt-3">
                Lanjut ke Bab 2
            </a>
        `;
    } else {
        html += `
            <p class="text-danger fw-bold">BELUM LULUS</p>
            <div class="d-flex gap-2 mt-3">
                <a href="/bab-1/bab-1-materi-a" class="btn btn-outline-info">
                    Ulangi Materi
                </a>
                <button class="btn btn-warning" onclick="resetQuiz()">
                    Coba Lagi
                </button>
            </div>
        `;
    }

    document.getElementById("quizResult").innerHTML = html;
    document.getElementById("quizResult").style.display = "block";

    if (auto) {
        document.getElementById("quizResult")
            .insertAdjacentHTML(
                "afterbegin",
                "<p class='text-warning fw-bold'>⏰ Waktu habis! Kuis dikirim otomatis.</p>"
            );
    }
}

function resetQuiz() {
    quizSubmitted = false;

    document.body.classList.remove("quiz-finished");


    // reset index soal
    currentQuestion = 0;

    // reset navigator
    resetNavigator();

    // tampilkan soal lagi
    document.getElementById("quizQuestions").style.display = "block";

    // tampilkan timer
    document.querySelector(".quiz-timer")?.classList.remove("d-none");
    document.querySelector(".quiz-timer")?.classList.remove("warning");

    // tampilkan navigator
    document.querySelector(".quiz-nav")?.classList.remove("d-none");

    // reset radio
    document.querySelectorAll('input[type="radio"]').forEach(r => {
        r.checked = false;
        r.disabled = false;
    });

    // reset tombol submit
    const submitBtn = document.getElementById("submitBtn");
    if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.classList.add("d-none");
    }

    // reset tombol next & prev
    document.getElementById("nextBtn")?.classList.remove("d-none");
    document.getElementById("prevBtn")?.removeAttribute("disabled");

    // reset hasil
    const resultBox = document.getElementById("quizResult");
    resultBox.innerHTML = "";
    resultBox.style.display = "none";

    // reset timer
    clearInterval(timerInterval);
    startTimer();

    // tampilkan soal pertama
    showQuestion(currentQuestion);

    window.scrollTo({ top: 0, behavior: "smooth" });
}

function lockQuiz() {
    document.querySelectorAll('input[type="radio"]').forEach(r => {
        r.disabled = true;
    });
    document.querySelector(".btn-submit").disabled = true;
}

document.addEventListener("DOMContentLoaded", () => {
    showQuestion(currentQuestion);
    initNavigatorClick();   // 🔥 INI PENTING
});



let currentQuestion = 0;
const questions = document.querySelectorAll(".quiz-question-item");
const totalQuestions = questions.length;

function showQuestion(index) {
    questions.forEach(q => q.classList.remove("active"));
    questions[index].classList.add("active");

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener("change", () => {
            const navBtn = document.querySelector(
                `.nav-item[data-index="${currentQuestion}"]`
            );

            navBtn.classList.remove("doubt");
            navBtn.classList.add("answered");
        });
    });

    document.querySelectorAll(".nav-item")
        .forEach(b => b.classList.remove("active"));

    document.querySelector(`.nav-item[data-index="${index}"]`)
        ?.classList.add("active");


    document.getElementById("questionIndicator").textContent =
        `Soal ${index + 1} dari ${totalQuestions}`;

    document.getElementById("prevBtn").disabled = index === 0;

    if (index === totalQuestions - 1) {
        document.getElementById("nextBtn")?.classList.add("d-none");
        document.getElementById("submitBtn").classList.remove("d-none");
    } else {
        document.getElementById("nextBtn")?.classList.remove("d-none");
        document.getElementById("submitBtn").classList.add("d-none");
    }
}


function nextQuestion() {
    const navBtn = document.querySelector(
        `.nav-item[data-index="${currentQuestion}"]`
    );

    // cek jawaban sebelum pindah
    if (isAnswered(currentQuestion)) {
        navBtn.classList.add("answered");
        navBtn.classList.remove("doubt");
    } else {
        navBtn.classList.add("doubt");
        navBtn.classList.remove("answered");
    }

    if (currentQuestion < totalQuestions - 1) {
        currentQuestion++;
        showQuestion(currentQuestion);
    }
}


function prevQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion(currentQuestion);
    }
}

function resetNavigator() {
    document.querySelectorAll(".nav-item").forEach((item, index) => {
        item.classList.remove("answered", "doubt", "active");
    });

    // set soal pertama aktif
    document.querySelector(`.nav-item[data-index="0"]`)
        ?.classList.add("active");
}


// Init
document.addEventListener("DOMContentLoaded", () => {
    showQuestion(currentQuestion);
});

function isAnswered(index) {
    const radios = questions[index].querySelectorAll('input[type="radio"]');
    return Array.from(radios).some(r => r.checked);
}

function initNavigatorClick() {
    document.querySelectorAll(".nav-item").forEach(item => {
        item.addEventListener("click", () => {

            // ❌ kalau kuis sudah disubmit, jangan bisa klik
            if (quizSubmitted) return;

            const index = parseInt(item.dataset.index);

            // pindah ke soal tujuan
            currentQuestion = index;
            showQuestion(currentQuestion);
        });
    });
}


