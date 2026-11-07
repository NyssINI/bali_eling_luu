/* =========================================
   BALI ELING LUU - CHATBOT FAQ
========================================= */

document.addEventListener("DOMContentLoaded", () => {
    const chat = document.createElement("div");

    chat.id = "baliChatWidget";

    chat.innerHTML = `
        <div id="chatPanel"
            class="fixed bottom-24 right-5 z-[9998] hidden w-[calc(100%-40px)] max-w-sm overflow-hidden rounded-2xl border border-[#E3E7E1] bg-white shadow-xl">

            <div class="flex items-center justify-between bg-[#14532D] p-4 text-white">
                <div>
                    <p class="font-bold">Bali Eling Luu</p>
                    <p class="text-xs text-white/80">Asisten informasi lingkungan</p>
                </div>
                <button id="chatClose" class="text-xl">✕</button>
            </div>

            <div id="chatMessages"
                class="flex max-h-80 min-h-48 flex-col gap-3 overflow-y-auto p-4">
                <div class="max-w-[85%] rounded-xl bg-[#F5F2EA] p-3 text-sm">
                    Halo! Ada yang ingin kamu ketahui tentang pengelolaan sampah?
                </div>
            </div>

            <form id="chatForm" class="flex gap-2 border-t border-[#E3E7E1] p-3">
                <input id="chatInput" type="text" required
                    placeholder="Tulis pertanyaan..."
                    class="min-w-0 flex-1 rounded-xl border border-[#E3E7E1] px-3 py-2 text-sm">

                <button type="submit"
                    class="rounded-xl bg-[#17803D] px-4 py-2 text-sm font-semibold text-white">
                    Kirim
                </button>
            </form>
        </div>

        <button id="chatToggle"
            class="fixed bottom-5 right-5 z-[9998] flex h-14 w-14 items-center justify-center rounded-full bg-[#17803D] text-2xl text-white shadow-lg"
            aria-label="Buka chat">
            ☘
        </button>
    `;

    document.body.appendChild(chat);

    const panel = document.getElementById("chatPanel");
    const messages = document.getElementById("chatMessages");
    const form = document.getElementById("chatForm");
    const input = document.getElementById("chatInput");

    document.getElementById("chatToggle").addEventListener("click", () => {
        panel.classList.toggle("hidden");
    });

    document.getElementById("chatClose").addEventListener("click", () => {
        panel.classList.add("hidden");
    });

    function cariJawaban(pertanyaan) {
        const teks = pertanyaan.toLowerCase();

        if (teks.includes("organik")) {
            return "Sampah organik berasal dari bahan alami, seperti sisa makanan dan daun. Sampah ini dapat diolah menjadi kompos.";
        }

        if (teks.includes("plastik") || teks.includes("botol")) {
            return "Botol plastik sebaiknya dikosongkan, dibersihkan, dan dipisahkan dari sampah lainnya untuk memudahkan proses daur ulang.";
        }

        if (teks.includes("b3") || teks.includes("baterai")) {
            return "Sampah B3 memerlukan penanganan khusus. Jangan mencampurkannya dengan sampah rumah tangga biasa.";
        }

        if (teks.includes("residu")) {
            return "Sampah residu adalah sampah yang sulit atau tidak dapat didaur ulang melalui proses biasa.";
        }

        if (teks.includes("lapor")) {
            return "Kamu bisa menggunakan bagian Lapor Luu pada halaman utama untuk mencatat masalah lingkungan.";
        }

        if (teks.includes("peta") || teks.includes("lokasi")) {
            return "Gunakan bagian Eco Map Bali untuk melihat lokasi fasilitas lingkungan yang datanya sudah tersedia.";
        }

        if (teks.includes("halo") || teks.includes("hai")) {
            return "Halo! Selamat datang di Bali Eling Luu. Silakan tanyakan hal seputar lingkungan dan pengelolaan sampah.";
        }

        return "Maaf, aku belum memiliki jawaban untuk pertanyaan tersebut. Coba tanyakan tentang sampah organik, plastik, B3, residu, Eco Map, atau Lapor Luu.";
    }

    function tambahPesan(teks, dariPengguna = false) {
        const bubble = document.createElement("div");

        bubble.className = dariPengguna
            ? "ml-auto max-w-[85%] rounded-xl bg-[#17803D] p-3 text-sm text-white"
            : "max-w-[85%] rounded-xl bg-[#F5F2EA] p-3 text-sm text-[#1E3A2A]";

        // textContent mencegah input pengguna diperlakukan sebagai HTML.
        bubble.textContent = teks;

        messages.appendChild(bubble);
        messages.scrollTop = messages.scrollHeight;
    }

    form.addEventListener("submit", event => {
        event.preventDefault();

        const pertanyaan = input.value.trim();

        if (!pertanyaan) return;

        tambahPesan(pertanyaan, true);
        input.value = "";

        tambahPesan(cariJawaban(pertanyaan));
    });
});