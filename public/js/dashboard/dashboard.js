document.addEventListener('DOMContentLoaded', () => {
  const bar = document.querySelector('.progress-fill');
  if (!bar) return;

  const target = bar.style.width;
  bar.style.width = '0%';

  setTimeout(() => {
    bar.style.width = target;
  }, 300);
});