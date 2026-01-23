function checkBS(btn, pilihan) {
    const box = btn.closest('.ai-question');
    const jawaban = box.dataset.answer;
    const feedback = box.querySelector('.ai-feedback');

    // kunci tombol setelah klik
    box.querySelectorAll('button').forEach(b => b.disabled = true);

    if (pilihan === jawaban) {
        btn.style.background = '#22c55e';
        btn.style.color = '#000';
        feedback.innerHTML = '✅ Benar';
    } else {
        btn.style.background = '#ef4444';
        btn.style.color = '#000';
        feedback.innerHTML = '❌ Salah';
    }
}
