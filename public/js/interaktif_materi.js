function checkAnswer(button, selected) {
    const question = button.closest('.ai-question');
    const correct = question.dataset.answer;
    const buttons = question.querySelectorAll('button');
    const feedback = question.querySelector('.ai-feedback');

    // Jika sudah dijawab, hentikan
    if (question.classList.contains('answered')) return;

    question.classList.add('answered');

    buttons.forEach(btn => {
        btn.disabled = true;

        const btnValue = btn.textContent.toLowerCase().includes('program')
            ? 'program'
            : 'ai';

        if (btnValue === correct) {
            btn.classList.add('btn-correct');
        }

        if (btn === button && selected !== correct) {
            btn.classList.add('btn-wrong');
        }
    });

    if (selected === correct) {
        feedback.textContent = '✅ Jawaban benar!';
        feedback.classList.add('feedback-correct');
    } else {
        feedback.textContent = '❌ Jawaban kurang tepat.';
        feedback.classList.add('feedback-wrong');
    }
}
