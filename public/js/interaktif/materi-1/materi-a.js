let draggedItem = null;

document.querySelectorAll(".drag-item").forEach(item => {
    item.addEventListener("dragstart", () => {
        draggedItem = item;
        setTimeout(() => item.style.opacity = "0.5", 0);
    });

    item.addEventListener("dragend", () => {
        draggedItem.style.opacity = "1";
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

        const accept = zone.dataset.accept;
        const type = draggedItem.dataset.type;

        if (accept === type) {
            zone.classList.remove("wrong");
            zone.classList.add("correct");
            zone.appendChild(draggedItem);

            draggedItem.setAttribute("draggable", "false");
            draggedItem.style.cursor = "default";

            showFeedback("✅ Benar! Penempatan tepat.", true);
        } else {
            zone.classList.add("wrong");
            showFeedback("❌ Salah. Coba perhatikan ciri AI.", false);
        }
    });
});

function showFeedback(text, success) {
    const feedback = document.getElementById("dropFeedback");
    feedback.textContent = text;
    feedback.style.color = success ? "#22c55e" : "#ef4444";
}
