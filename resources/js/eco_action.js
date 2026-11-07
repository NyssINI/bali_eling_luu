/* =========================================
   BALI ELING LUU - ECO ACTION
========================================= */

document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("laporLuuSection");

    if (!container) return;

    container.innerHTML = `
        <div class="mx-auto max-w-2xl">
            <div class="mb-6">
                <p class="text-sm font-semibold uppercase tracking-wider text-[#17803D]">
                    Lapor Luu
                </p>
                <h3 class="mt-2 text-2xl font-bold text-[#1E3A2A]">
                    Temukan masalah lingkungan?
                </h3>
                <p class="mt-2 text-sm text-[#6B7A70]">
                    Catat informasi masalah lingkungan untuk ditindaklanjuti.
                </p>
            </div>

            <form id="formLaporLuu"
                class="space-y-4 rounded-2xl border border-[#E3E7E1] bg-white p-5">

                <div>
                    <label class="mb-2 block text-sm font-semibold">
                        Jenis laporan
                    </label>
                    <select id="laporKategori" required
                        class="w-full rounded-xl border border-[#E3E7E1] p-3">
                        <option value="">Pilih jenis laporan</option>
                        <option>Sampah menumpuk</option>
                        <option>Pencemaran lingkungan</option>
                        <option>Saluran tersumbat sampah</option>
                        <option>Kerusakan fasilitas lingkungan</option>
                        <option>Lainnya</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold">
                        Lokasi kejadian
                    </label>
                    <input id="laporLokasi" type="text" required
                        placeholder="Contoh: Nama jalan atau desa"
                        class="w-full rounded-xl border border-[#E3E7E1] p-3">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold">
                        Deskripsi
                    </label>
                    <textarea id="laporDeskripsi" required rows="4"
                        placeholder="Jelaskan kondisi yang ditemukan..."
                        class="w-full rounded-xl border border-[#E3E7E1] p-3"></textarea>
                </div>

                <button type="submit"
                    class="w-full rounded-xl bg-[#17803D] px-5 py-3 font-semibold text-white hover:bg-[#14532D]">
                    Simpan laporan demo
                </button>

                <p class="text-xs text-[#6B7A70]">
                    Mode demo: laporan hanya disimpan di browser ini dan belum dikirim ke server.
                </p>
            </form>

            <div class="mt-8">
                <h3 class="mb-4 text-lg font-bold text-[#1E3A2A]">
                    Laporan tersimpan di perangkat ini
                </h3>
                <div id="daftarLaporanLuu" class="space-y-3"></div>
            </div>
        </div>
    `;

    const form = document.getElementById("formLaporLuu");
    const daftar = document.getElementById("daftarLaporanLuu");

    function ambilLaporan() {
        try {
            return JSON.parse(localStorage.getItem("baliElingLaporan")) || [];
        } catch {
            return [];
        }
    }

    function tampilkanLaporan() {
        const laporan = ambilLaporan();

        if (laporan.length === 0) {
            daftar.innerHTML = `
                <p class="rounded-xl bg-white p-4 text-sm text-[#6B7A70]">
                    Belum ada laporan tersimpan.
                </p>
            `;
            return;
        }

        daftar.innerHTML = laporan.map(item => `
            <article class="rounded-xl border border-[#E3E7E1] bg-white p-4">
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <p class="font-semibold text-[#1E3A2A]">${item.kategori}</p>
                    <span class="text-xs text-[#17803D]">Demo lokal</span>
                </div>
                <p class="mt-2 text-sm text-[#6B7A70]">${item.lokasi}</p>
                <p class="mt-2 text-sm text-[#1E3A2A]">${item.deskripsi}</p>
                <p class="mt-3 text-xs text-[#6B7A70]">${item.tanggal}</p>
            </article>
        `).join("");
    }

    form.addEventListener("submit", event => {
        event.preventDefault();

        const laporan = {
            kategori: document.getElementById("laporKategori").value,
            lokasi: document.getElementById("laporLokasi").value.trim(),
            deskripsi: document.getElementById("laporDeskripsi").value.trim(),
            tanggal: new Date().toLocaleString("id-ID")
        };

        const semuaLaporan = ambilLaporan();
        semuaLaporan.unshift(laporan);

        try {
            localStorage.setItem(
                "baliElingLaporan",
                JSON.stringify(semuaLaporan)
            );

            form.reset();
            tampilkanLaporan();

            alert("Laporan demo berhasil disimpan di browser!");
        } catch {
            alert("Laporan tidak dapat disimpan di browser.");
        }
    });

    tampilkanLaporan();
});