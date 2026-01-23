function classify(button, choice) {
  const item = button.closest('.classify-item');
  const correct = item.dataset.answer;
  const feedback = item.querySelector('.feedback');
  const buttons = item.querySelectorAll('button');

  // kunci tombol
  buttons.forEach(btn => btn.disabled = true);

  if (choice === correct) {
    button.classList.add('correct');
    feedback.innerHTML = "✅ Benar! Ini termasuk <strong>Kecerdasan Buatan</strong>.";
  } else {
    button.classList.add('wrong');
    feedback.innerHTML = "❌ Salah. Coba Belajar Lagi Ya ";
  }
}
