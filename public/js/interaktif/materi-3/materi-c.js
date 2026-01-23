function checkDebug(button, choice) {
    const card = button.closest('.debug-card');
    const correct = card.dataset.answer;
    const feedback = card.querySelector('.debug-feedback');
    const buttons = card.querySelectorAll('button');

    // kunci tombol
    buttons.forEach(btn => btn.disabled = true);

    if (choice === correct) {
        button.classList.add('correct');
        feedback.innerHTML = "✅ Jawaban benar! Analisis kamu tepat.";
        feedback.classList.add('success');
    } else {
        button.classList.add('wrong');
        feedback.innerHTML = "❌ Kurang tepat. Perhatikan kembali penyebab kesalahan model AI.";
        feedback.classList.add('error');

        // tandai jawaban benar
        buttons.forEach(btn => {
            if (btn.getAttribute("onclick").includes(`'${correct}'`)) {
                btn.classList.add('correct-outline');
            }
        });
    }
}
