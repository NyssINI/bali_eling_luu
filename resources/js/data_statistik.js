/* =========================================
   BALI ELING LUU - DATA STATISTIK
========================================= */

window.dataStatistikBali = [];

window.renderStatistikBali = function () {
    const container = document.getElementById("statistikBali");

    if (!container) return;

    if (window.dataStatistikBali.length === 0) {
        container.innerHTML = `
            <div class="rounded-2xl border border-[#E3E7E1] bg-white p-5">
                <p class="text-sm text-[#6B7A70]">
                    Data statistik lingkungan Bali akan ditampilkan
                    setelah sumber data resmi tersedia.
                </p>
            </div>
        `;
        return;
    }

    container.innerHTML = window.dataStatistikBali.map(item => `
        <div class="rounded-2xl bg-white p-5">
            <p class="text-sm text-[#6B7A70]">${item.label}</p>
            <p class="mt-2 text-2xl font-bold text-[#14532D]">${item.nilai}</p>
            <p class="mt-1 text-xs text-[#6B7A70]">${item.sumber || ""}</p>
        </div>
    `).join("");
};

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", window.renderStatistikBali);
} else {
    window.renderStatistikBali();
}