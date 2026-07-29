let draggedFlowItem = null;

document.addEventListener("DOMContentLoaded", function () {
    initializeFlowItems();
    initializeFlowForm();
});

/**
 * Memasang fungsi drag and drop pada item.
 */
function initializeFlowItems() {
    document.querySelectorAll(".flow-item").forEach((item) => {
        item.addEventListener("dragstart", function () {
            draggedFlowItem = item;
            item.style.opacity = "0.5";
        });

        item.addEventListener("dragend", function () {
            item.style.opacity = "1";
            draggedFlowItem = null;
        });

        item.addEventListener("dragover", function (event) {
            event.preventDefault();
        });

        item.addEventListener("drop", function (event) {
            event.preventDefault();

            if (!draggedFlowItem || draggedFlowItem === item) {
                return;
            }

            const container = item.parentNode;

            const items = [
                ...container.querySelectorAll(".flow-item")
            ];

            const draggedIndex =
                items.indexOf(draggedFlowItem);

            const targetIndex =
                items.indexOf(item);

            if (draggedIndex < targetIndex) {
                container.insertBefore(
                    draggedFlowItem,
                    item.nextSibling
                );
            } else {
                container.insertBefore(
                    draggedFlowItem,
                    item
                );
            }

            clearFlowResult();
        });
    });
}

/**
 * Menghapus hasil sebelumnya ketika urutan diubah.
 */
function clearFlowResult() {
    document.querySelectorAll(".flow-item").forEach((item) => {
        item.classList.remove("correct", "wrong");
    });

    const flowResult =
        document.getElementById("flowResult");

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (flowResult) {
        flowResult.textContent = "";
        flowResult.className = "flow-result";
    }

    if (scoreInfo) {
        scoreInfo.textContent = "";
        scoreInfo.className = "score-info";
    }
}

/**
 * Mengecek apakah urutan sudah benar.
 */
function checkFlow() {
    const items =
        document.querySelectorAll(".flow-item");

    let correct = true;

    items.forEach((item, index) => {
        const expectedStep = index + 1;
        const actualStep = Number(item.dataset.step);

        item.classList.remove("correct", "wrong");

        if (actualStep === expectedStep) {
            item.classList.add("correct");
        } else {
            item.classList.add("wrong");
            correct = false;
        }
    });

    return correct;
}

/**
 * Mengecek hasil ketika tombol utama ditekan.
 */
function initializeFlowForm() {
    const form =
        document.getElementById("formSelesai");

    const submitButton =
        document.getElementById("btnSelesai");

    if (!form || !submitButton) {
        return;
    }

    form.addEventListener("submit", function (event) {
        const flowResult =
            document.getElementById("flowResult");

        const scoreInfo =
            document.getElementById("scoreInfo");

        const isCompleted =
            submitButton.dataset.completed === "true";

        const flowBenar = checkFlow();

        if (!flowBenar) {
            event.preventDefault();

            flowResult.textContent =
                "❌ Urutan masih belum tepat. Perhatikan kembali langkah yang berwarna merah.";

            flowResult.className =
                "flow-result flow-result-error";

            scoreInfo.textContent =
                "Aktivitas belum dapat diselesaikan.";

            scoreInfo.className =
                "score-info score-error";

            return;
        }

        flowResult.textContent =
            "✅ Urutan proses kecerdasan buatan sudah benar.";

        flowResult.className =
            "flow-result flow-result-success";

        /*
         * Jika materi telah selesai, hasil hanya menjadi latihan.
         */
        if (isCompleted) {
            event.preventDefault();

            scoreInfo.textContent =
                "Hasil latihan benar. Penyelesaian materi sebelumnya tidak berubah.";

            scoreInfo.className =
                "score-info score-success";

            return;
        }

        /*
         * Jika belum selesai, form dikirim ke server.
         */
        scoreInfo.textContent =
            "✅ Aktivitas selesai dan progres akan disimpan.";

        scoreInfo.className =
            "score-info score-success";
    });
}

/**
 * Mengembalikan susunan ke posisi awal.
 */
function resetFlowActivity() {
    const container =
        document.querySelector(".flow-items");

    const flowResult =
        document.getElementById("flowResult");

    const scoreInfo =
        document.getElementById("scoreInfo");

    if (!container) {
        return;
    }

    const initialOrder = [2, 4, 1, 3];

    initialOrder.forEach((step) => {
        const item = container.querySelector(
            `.flow-item[data-step="${step}"]`
        );

        if (item) {
            container.appendChild(item);
        }
    });

    document.querySelectorAll(".flow-item").forEach((item) => {
        item.setAttribute("draggable", "true");

        item.style.opacity = "1";
        item.style.pointerEvents = "auto";
        item.style.cursor = "grab";

        item.classList.remove("correct", "wrong");
    });

    draggedFlowItem = null;

    if (flowResult) {
        flowResult.textContent = "";
        flowResult.className = "flow-result";
    }

    if (scoreInfo) {
        scoreInfo.textContent = "";
        scoreInfo.className = "score-info";
    }

    document.querySelector(".ai-flow")?.scrollIntoView({
        behavior: "smooth",
        block: "start"
    });
}