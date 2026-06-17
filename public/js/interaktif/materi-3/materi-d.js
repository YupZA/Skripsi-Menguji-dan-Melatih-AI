let draggedItem = null;
const KKM = 75;

document.querySelectorAll(".drag-item").forEach(item => {
  item.addEventListener("dragstart", () => {
    if (item.getAttribute("draggable") === "false") return;

    draggedItem = item;
    setTimeout(() => item.classList.add("dragging"), 0);
  });

  item.addEventListener("dragend", () => {
    item.classList.remove("dragging");
    draggedItem = null;
  });
});

document.querySelectorAll(".drop-zone").forEach(zone => {
  zone.addEventListener("dragover", e => {
    e.preventDefault();
    zone.classList.add("hover");
  });

  zone.addEventListener("dragleave", () => {
    zone.classList.remove("hover");
  });

  zone.addEventListener("drop", () => {
    zone.classList.remove("hover");

    if (!draggedItem) return;

    const correctType = zone.dataset.accept;
    const itemType = draggedItem.dataset.type;

    zone.appendChild(draggedItem);

    draggedItem.classList.remove("correct", "wrong");

    if (correctType === itemType) {
      draggedItem.classList.add("correct");
      draggedItem.dataset.correct = "true";
    } else {
      draggedItem.classList.add("wrong");
      draggedItem.dataset.correct = "false";
    }

    draggedItem.setAttribute("draggable", "false");
    draggedItem = null;
  });
});

document.getElementById("formSelesai").addEventListener("submit", function(e) {
  const totalItem = document.querySelectorAll(".drag-item").length;
  const sudahDikerjakan = document.querySelectorAll('.drag-item[draggable="false"]').length;
  const totalBenar = document.querySelectorAll('.drag-item[data-correct="true"]').length;

  const nilai = Math.round((totalBenar / totalItem) * 100);
  const scoreInfo = document.getElementById("scoreInfo");

  if (sudahDikerjakan < totalItem) {
    e.preventDefault();
    scoreInfo.innerHTML = "❌ Semua contoh harus diseret ke kotak proyek terlebih dahulu.";
    scoreInfo.style.color = "#ef4444";
    return;
  }

  if (nilai < KKM) {
    e.preventDefault();
    scoreInfo.innerHTML = `❌ Nilai kamu ${nilai}. Belum mencapai KKM ${KKM}. Materi belum selesai.`;
    scoreInfo.style.color = "#ef4444";
    return;
  }

  scoreInfo.innerHTML = `✅ Nilai kamu ${nilai}. Aktivitas selesai.`;
  scoreInfo.style.color = "#22c55e";
});

document.addEventListener("DOMContentLoaded", function () {
  const btnSelesai = document.getElementById("btnSelesai");

  if (btnSelesai && btnSelesai.innerText.trim() === "Aktivitas Selesai") {
    document.querySelectorAll(".drag-item").forEach(item => {
      item.setAttribute("draggable", "false");
      item.style.opacity = "0.6";
      item.style.pointerEvents = "none";
    });
  }
});