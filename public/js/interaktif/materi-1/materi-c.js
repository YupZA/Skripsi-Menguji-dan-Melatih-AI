let draggedFlowItem = null;

document.querySelectorAll(".flow-item").forEach(item => {
    item.addEventListener("dragstart", () => {
        draggedFlowItem = item;
        item.style.opacity = "0.5";
    });

    item.addEventListener("dragend", () => {
        draggedFlowItem.style.opacity = "1";
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

    if (correct) {
        result.textContent = "✅ Alur AI sudah benar! Kamu paham prosesnya.";
        result.style.color = "#22c55e";
    } else {
        result.textContent = "❌ Masih ada urutan yang salah. Coba perhatikan kembali alurnya.";
        result.style.color = "#ef4444";
    }
}
