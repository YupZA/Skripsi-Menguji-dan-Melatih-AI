let draggedItem = null;

const KKM = 75;

document.addEventListener("DOMContentLoaded", function () {
    initializeDragItems();
    initializeDropZones();
    initializeActivityForm();
});

/**
 * Memasang event drag pada seluruh item.
 */
function initializeDragItems() {
    document.querySelectorAll(".drag-item").forEach((item) => {
        item.addEventListener("dragstart", function () {
            if (item.getAttribute("draggable") === "false") {
                return;
            }

            draggedItem = item;

            setTimeout(() => {
                item.classList.add("dragging");
            }, 0);
        });

        item.addEventListener("dragend", function () {
            item.classList.remove("dragging");
            draggedItem = null;
        });
    });
}

/**
 * Memasang event pada seluruh kotak kategori.
 */
function initializeDropZones() {
    document.querySelectorAll(".drop-zone").forEach((zone) => {
        zone.addEventListener("dragover", function (event) {
            event.preventDefault();
            zone.classList.add("hover");
        });

        zone.addEventListener("dragleave", function () {
            zone.classList.remove("hover");
        });

        zone.addEventListener("drop", function (event) {
            event.preventDefault();
            zone.classList.remove("hover");

            if (!draggedItem) {
                return;
            }

            const acceptedType = zone.dataset.accept;
            const itemType = draggedItem.dataset.type;

            zone.appendChild(draggedItem);

            draggedItem.classList.remove(
                "correct",
                "wrong"
            );

            if (acceptedType === itemType) {
                draggedItem.classList.add("correct");
                draggedItem.dataset.correct = "true";
            } else {
                draggedItem.classList.add("wrong");
                draggedItem.dataset.correct = "false";
            }

            draggedItem.setAttribute("draggable", "false");
            draggedItem.style.cursor = "default";
            draggedItem.style.opacity = "1";

            draggedItem = null;
        });
    });
}

/**
 * Menangani proses pengumpulan aktivitas.
 */
function initializeActivityForm() {
    const form =
        document.getElementById("formSelesai");

    const submitButton =
        document.getElementById("btnSelesai");

    if (!form || !submitButton) {
        return;
    }

    form.addEventListener("submit", function (event) {
        const totalItem =
            document.querySelectorAll(".drag-item").length;

        const sudahDikerjakan =
            document.querySelectorAll(
                '.drag-item[draggable="false"]'
            ).length;

        const totalBenar =
            document.querySelectorAll(
                '.drag-item[data-correct="true"]'
            ).length;

        const nilai =
            totalItem > 0
                ? Math.round((totalBenar / totalItem) * 100)
                : 0;

        const scoreInfo =
            document.getElementById("scoreInfo");

        const isCompleted =
            submitButton.dataset.completed === "true";

        if (sudahDikerjakan < totalItem) {
            event.preventDefault();

            scoreInfo.textContent =
                "❌ Semua contoh harus diseret ke jenis proyek terlebih dahulu.";

            scoreInfo.className =
                "score-info score-error";

            return;
        }

        /*
         * Jika materi sudah pernah selesai,
         * hasil hanya dianggap latihan.
         */
        if (isCompleted) {
            event.preventDefault();

            if (nilai >= KKM) {
                scoreInfo.textContent =
                    `✅ Nilai latihan kamu ${nilai}. ` +
                    `Kamu telah mencapai KKM ${KKM}. ` +
                    "Penyelesaian materi sebelumnya tidak berubah.";

                scoreInfo.className =
                    "score-info score-success";
            } else {
                scoreInfo.textContent =
                    `Nilai latihan kamu ${nilai}. ` +
                    `Belum mencapai KKM ${KKM}. ` +
                    "Penyelesaian materi sebelumnya tetap tersimpan.";

                scoreInfo.className =
                    "score-info score-warning";
            }

            return;
        }

        /*
         * Pengerjaan pertama harus mencapai KKM.
         */
        if (nilai < KKM) {
            event.preventDefault();

            scoreInfo.textContent =
                `❌ Nilai kamu ${nilai}. ` +
                `Belum mencapai KKM ${KKM}. ` +
                "Silakan ulangi aktivitas.";

            scoreInfo.className =
                "score-info score-error";

            return;
        }

        scoreInfo.textContent =
            `✅ Nilai kamu ${nilai}. ` +
            "Aktivitas selesai dan progres akan disimpan.";

        scoreInfo.className =
            "score-info score-success";
    });
}

/**
 * Mengembalikan seluruh item ke posisi awal.
 */
function resetProjectActivity() {
    const itemContainer =
        document.querySelector(".drag-items");

    const items =
        document.querySelectorAll(".drag-item");

    const dropZones =
        document.querySelectorAll(".drop-zone");

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (!itemContainer) {
        return;
    }

    items.forEach((item) => {
        itemContainer.appendChild(item);

        item.setAttribute("draggable", "true");

        item.style.cursor = "grab";
        item.style.opacity = "1";
        item.style.pointerEvents = "auto";

        item.classList.remove(
            "dragging",
            "correct",
            "wrong"
        );

        delete item.dataset.correct;
    });

    dropZones.forEach((zone) => {
        zone.classList.remove("hover");
    });

    if (scoreInfo) {
        scoreInfo.textContent = "";
        scoreInfo.className = "score-info";
    }

    draggedItem = null;

    document.querySelector(".ai-dragdrop")
        ?.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
}