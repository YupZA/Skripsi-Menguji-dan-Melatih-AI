document.addEventListener('DOMContentLoaded', () => {
  const bar = document.querySelector('.progress-fill');
  if (!bar) return;

  const target = bar.style.width;
  bar.style.width = '0%';

  setTimeout(() => {
    bar.style.width = target;
  }, 300);
});

function openEditProfile() {
    document.getElementById('editProfileModal').classList.remove('hidden');
}

function closeEditProfile() {
    document.getElementById('editProfileModal').classList.add('hidden');
}

/* klik di luar modal = tutup */
document.getElementById('editProfileModal').addEventListener('click', function (e) {
    if (e.target === this) {
        closeEditProfile();
    }
});


function openQuizModal() {
    document.getElementById("quizModal")
        .classList.remove("hidden");
}

function closeQuizModal() {
    document.getElementById("quizModal")
        .classList.add("hidden");
}
