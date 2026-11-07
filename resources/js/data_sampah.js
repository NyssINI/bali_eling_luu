/* =========================================
   BALI ELING LUU - DATA SAMPAH
========================================= */

window.dataSampah = [
    {
        nama: "Sisa makanan",
        kategori: "Organik",
        deskripsi: "Sisa nasi, sayuran, buah, dan bahan makanan alami.",
        cara: "Pisahkan dari sampah lainnya. Sisa makanan dapat diolah menjadi kompos."
    },
    {
        nama: "Daun kering",
        kategori: "Organik",
        deskripsi: "Daun, ranting kecil, dan bagian tumbuhan.",
        cara: "Kumpulkan secara terpisah dan manfaatkan sebagai bahan kompos."
    },
    {
        nama: "Botol plastik",
        kategori: "Anorganik",
        deskripsi: "Botol minuman berbahan plastik.",
        cara: "Kosongkan isinya, bersihkan, lalu pisahkan untuk didaur ulang."
    },
    {
        nama: "Kardus",
        kategori: "Anorganik",
        deskripsi: "Kemasan berbahan kertas atau karton.",
        cara: "Pastikan kering dan tidak tercampur sisa makanan."
    },
    {
        nama: "Popok sekali pakai",
        kategori: "Residu",
        deskripsi: "Sampah yang sulit atau tidak dapat didaur ulang melalui proses biasa.",
        cara: "Bungkus dengan baik dan buang sesuai ketentuan pengelolaan sampah setempat."
    },
    {
        nama: "Baterai bekas",
        kategori: "B3",
        deskripsi: "Baterai yang sudah tidak digunakan.",
        cara: "Jangan dicampur dengan sampah rumah tangga. Serahkan ke fasilitas pengumpulan limbah B3."
    }
];

window.renderPanduanSampah = function (keyword = "", kategori = "Semua") {
    const container = document.getElementById("panduan");

    if (!container) return;

    const hasil = window.dataSampah.filter(item => {
        const cocokNama = item.nama.toLowerCase().includes(keyword.toLowerCase()) ||
            item.deskripsi.toLowerCase().includes(keyword.toLowerCase());

        const cocokKategori = kategori === "Semua" ||
            item.kategori.toLowerCase() === kategori.toLowerCase();

        return cocokNama && cocokKategori;
    });

    if (hasil.length === 0) {
        container.innerHTML = `
            <div class="col-span-full py-8 text-center text-gray-500">
                <p class="font-semibold">Panduan tidak ditemukan.</p>
                <p class="mt-1 text-sm">Coba kata kunci atau kategori lainnya.</p>
            </div>
        `;
        return;
    }

    container.innerHTML = hasil.map(item => `
        <article class="rounded-2xl border border-[#E3E7E1] bg-white p-5">
            <span class="text-xs font-semibold uppercase tracking-wide text-[#17803D]">
                ${item.kategori}
            </span>

            <h3 class="mt-2 text-lg font-bold text-[#1E3A2A]">
                ${item.nama}
            </h3>

            <p class="mt-2 text-sm text-[#6B7A70]">
                ${item.deskripsi}
            </p>

            <div class="mt-4 border-t border-[#E3E7E1] pt-3">
                <p class="text-sm font-semibold text-[#14532D]">Cara mengelola:</p>
                <p class="mt-1 text-sm text-[#6B7A70]">${item.cara}</p>
            </div>
        </article>
    `).join("");
};

document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("q");
    const select = document.getElementById("kat");

    if (input || select) {
        const cari = () => {
            window.renderPanduanSampah(
                input?.value || "",
                select?.value || "Semua"
            );
        };

        input?.addEventListener("input", cari);
        select?.addEventListener("change", cari);
    }
});