/* =========================================
   BALI ELING LUU - AI SCANNER DEMO
========================================= */

window.openBaliElingScanner = function () {
    const existing = document.getElementById("scannerModal");

    if (existing) {
        existing.classList.remove("hidden");
        return;
    }

    const modal = document.createElement("div");

    modal.id = "scannerModal";
    modal.className = "fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 p-4";

    modal.innerHTML = `
        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#17803D]">
                        Bali Eling Luu
                    </p>
                    <h2 class="mt-1 text-xl font-bold text-[#1E3A2A]">
                        AI Waste Scanner
                    </h2>
                </div>

                <button id="closeScanner"
                    class="rounded-full px-3 py-2 text-gray-500 hover:bg-gray-100">
                    ✕
                </button>
            </div>

            <p class="mt-3 text-sm text-[#6B7A70]">
                Pilih gambar sampah untuk melihat pratinjau.
                Identifikasi otomatis AI belum tersedia.
            </p>

            <label class="mt-5 block cursor-pointer rounded-xl border-2 border-dashed border-[#B8CDBB] p-6 text-center hover:bg-[#F5F2EA]">
                <span class="text-3xl">📷</span>
                <p class="mt-2 font-semibold text-[#14532D]">
                    Pilih gambar
                </p>
                <p class="mt-1 text-xs text-[#6B7A70]">
                    JPG, PNG, atau WEBP
                </p>
                <input id="scannerFile" type="file" accept="image/*" class="hidden">
            </label>

            <img id="scannerPreview"
                class="mt-4 hidden max-h-64 w-full rounded-xl object-contain">

            <div class="mt-5">
                <label class="mb-2 block text-sm font-semibold text-[#1E3A2A]">
                    Pilih kategori secara manual
                </label>

                <select id="scannerCategory"
                    class="w-full rounded-xl border border-[#E3E7E1] p-3">
                    <option value="">Pilih kategori</option>
                    <option>Organik</option>
                    <option>Anorganik</option>
                    <option>Residu</option>
                    <option>B3</option>
                </select>
            </div>

            <div id="scannerResult"
                class="mt-4 hidden rounded-xl bg-[#F5F2EA] p-4 text-sm text-[#1E3A2A]">
            </div>

            <button id="scannerCheck"
                class="mt-5 w-full rounded-xl bg-[#17803D] px-5 py-3 font-semibold text-white hover:bg-[#14532D]">
                Tampilkan panduan
            </button>
        </div>
    `;

    document.body.appendChild(modal);

    const close = () => modal.remove();

    modal.querySelector("#closeScanner").addEventListener("click", close);

    modal.addEventListener("click", event => {
        if (event.target === modal) close();
    });

    const fileInput = modal.querySelector("#scannerFile");
    const preview = modal.querySelector("#scannerPreview");

    fileInput.addEventListener("change", () => {
        const file = fileInput.files[0];

        if (!file) return;

        if (!file.type.startsWith("image/")) {
            alert("Silakan pilih file gambar.");
            fileInput.value = "";
            return;
        }

        const reader = new FileReader();

        reader.onload = event => {
            preview.src = event.target.result;
            preview.classList.remove("hidden");
        };

        reader.readAsDataURL(file);
    });

    modal.querySelector("#scannerCheck").addEventListener("click", () => {
        const kategori = modal.querySelector("#scannerCategory").value;
        const result = modal.querySelector("#scannerResult");

        if (!fileInput.files.length) {
            alert("Pilih gambar terlebih dahulu.");
            return;
        }

        if (!kategori) {
            alert("Silakan pilih kategori sampah.");
            return;
        }

        result.innerHTML = `
            <p class="font-bold">Kategori pilihan: ${kategori}</p>
            <p class="mt-2">
                Ini merupakan pilihan manual, bukan hasil identifikasi AI.
                Gunakan panduan pemilahan sampah sesuai kategori tersebut.
            </p>
        `;

        result.classList.remove("hidden");
    });
});