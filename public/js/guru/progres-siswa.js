document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchInput");
    const clearBtn = document.getElementById("clearSearch");
    const kelasFilter = document.getElementById("kelasFilter");
    const showData = document.getElementById("showData");
    const rows = document.querySelectorAll(".progres-table tbody tr");

    function filterTable() {

        const keyword = searchInput.value.toLowerCase();
        const kelasValue = kelasFilter.value;
        let visibleCount = 0;
        const maxShow = showData.value;

        rows.forEach(row => {

            const nama = row.children[1].textContent.toLowerCase();
            const kelas = row.children[2].textContent.trim().toLowerCase();

            const matchSearch =
                nama.includes(keyword) ||
                kelas.includes(keyword);

            const matchKelas =
                kelasValue === "" ||
                kelas === kelasValue.toLowerCase();

            if (matchSearch && matchKelas) {

                if (maxShow === "all" || visibleCount < parseInt(maxShow)) {
                    row.style.display = "";
                    visibleCount++;
                } else {
                    row.style.display = "none";
                }

            } else {
                row.style.display = "none";
            }

        });

        clearBtn.style.display = keyword ? "block" : "none";
    }

    searchInput.addEventListener("keyup", filterTable);
    kelasFilter.addEventListener("change", filterTable);
    showData.addEventListener("change", filterTable);

    clearBtn.addEventListener("click", function () {
        searchInput.value = "";
        filterTable();
    });

    filterTable();
});