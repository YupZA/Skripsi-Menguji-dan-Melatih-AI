function checkOutput(button, selected) {
  const question = button.closest(".ai-question");
  const correct = question.dataset.answer;
  const feedback = question.querySelector(".ai-feedback");

  // kunci tombol setelah memilih
  question.querySelectorAll("button").forEach(btn => {
    btn.disabled = true;
    btn.style.opacity = "0.6";
  });

  if (selected === correct) {
    button.style.background = "#22c55e";
    button.style.color = "#000";
    feedback.innerHTML = "✅ Benar! Output AI sesuai dengan input.";
    feedback.style.color = "#22c55e";
  } else {
    button.style.background = "#ef4444";
    button.style.color = "#fff";
    feedback.innerHTML = `❌ Salah. Output yang benar adalah <strong>${correct}</strong>.`;
    feedback.style.color = "#ef4444";
  }
}
