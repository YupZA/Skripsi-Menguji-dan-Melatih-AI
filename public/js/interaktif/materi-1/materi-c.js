let draggedFlowItem = null;
let flowBenar = false;

document.querySelectorAll(".flow-item").forEach(item => {
    item.addEventListener("dragstart", () => {
        if (item.getAttribute("draggable") === "false") return;

        draggedFlowItem = item;
        item.style.opacity = "0.5";
    });

    item.addEventListener("dragend", () => {
        if (draggedFlowItem) {
            draggedFlowItem.style.opacity = "1";
        }

        draggedFlowItem = null;
    });

    item.addEventListener("dragover", e => {
        e.preventDefault();
    });

    item.addEventListener("drop", () => {
        if (draggedFlowItem && draggedFlowItem !== item) {
            const container = item.parentNode;
            const draggedIndex = [...container.children].indexOf(draggedFlowItem);
            const targetIndex = [...container.children].indexOf(item);

            if (draggedIndex < targetIndex) {
                container.insertBefore(draggedFlowItem, item.nextSibling);
            } else {
                container.insertBefore(draggedFlowItem, item);
            }

            flowBenar = false;

            const btnSelesai = document.getElementById("btnSelesai");
            if (btnSelesai && btnSelesai.innerText.trim() !== "Aktivitas Selesai") {
                btnSelesai.disabled = true;
            }
        }
    });
});

function checkFlow() {
    const items = document.querySelectorAll(".flow-item");
    let correct = true;

    items.forEach((item, index) => {
        const expected = index + 1;
        const actual = parseInt(item.dataset.step);

        item.classList.remove("correct", "wrong");

        if (actual === expected) {
            item.classList.add("correct");
        } else {
            item.classList.add("wrong");
            correct = false;
        }
    });

    const result = document.getElementById("flowResult");
    const btnSelesai = document.getElementById("btnSelesai");

    if (correct) {
        flowBenar = true;

        result.textContent = "✅ Alur AI sudah benar! Kamu bisa submit aktivitas.";
        result.style.color = "#22c55e";

        if (btnSelesai && btnSelesai.innerText.trim() !== "Aktivitas Selesai") {
            btnSelesai.disabled = false;
        }
    } else {
        flowBenar = false;

        result.textContent = "❌ Masih ada urutan yang salah. Coba perhatikan kembali alurnya.";
        result.style.color = "#ef4444";

        if (btnSelesai) {
            btnSelesai.disabled = true;
        }
    }
}

document.getElementById("formSelesai").addEventListener("submit", function(e) {
    const scoreInfo = document.getElementById("scoreInfo");

    if (!flowBenar) {
        e.preventDefault();
        scoreInfo.innerHTML = "❌ Urutan belum benar. Silakan cek urutan terlebih dahulu.";
        scoreInfo.style.color = "#ef4444";
        return;
    }

    scoreInfo.innerHTML = "✅ Aktivitas selesai.";
    scoreInfo.style.color = "#22c55e";
});

document.addEventListener("DOMContentLoaded", function () {
    const btnSelesai = document.getElementById("btnSelesai");

    if (btnSelesai && btnSelesai.innerText.trim() === "Aktivitas Selesai") {
        document.querySelectorAll(".flow-item").forEach(item => {
            item.setAttribute("draggable", "false");
            item.style.opacity = "0.6";
            item.style.pointerEvents = "none";
        });

        const btnCheck = document.querySelector(".btn-flow-check");
        if (btnCheck) {
            btnCheck.disabled = true;
            btnCheck.style.opacity = "0.6";
        }
    }
});