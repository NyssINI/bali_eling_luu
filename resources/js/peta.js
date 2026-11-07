/* =========================================
   BALI ELING LUU - ECO MAP
========================================= */

document.addEventListener("DOMContentLoaded", () => {
    const mapElement = document.getElementById("baliEcoMap");

    if (!mapElement || typeof L === "undefined") return;

    const baliCenter = [-8.4095, 115.1889];

    const map = L.map("baliEcoMap").setView(baliCenter, 9);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const markerLayer = L.layerGroup().addTo(map);

    const filterKab = document.getElementById("filterPetaKab");
    const filterKat = document.getElementById("filterPetaKat");
    const inputCari = document.getElementById("inputCariPeta");
    const listContainer = document.getElementById("petaListFasilitas");
    const btnLokasi = document.getElementById("btnLokasiSaya");

    function renderPeta() {
        markerLayer.clearLayers();

        const kabupaten = filterKab?.value || "Semua";
        const kategori = filterKat?.value || "Semua";
        const keyword = inputCari?.value.toLowerCase() || "";

        const hasil = (window.dataLokasiPeta || []).filter(item => {
            const cocokKab = kabupaten === "Semua" ||
                item.kabupaten === kabupaten;

            const cocokKat = kategori === "Semua" ||
                item.kategori === kategori;

            const cocokNama =
                item.nama.toLowerCase().includes(keyword) ||
                item.alamat.toLowerCase().includes(keyword);

            return cocokKab && cocokKat && cocokNama;
        });

        if (listContainer) {
            if (hasil.length === 0) {
                listContainer.innerHTML = `
                    <div class="py-6 text-center">
                        <p class="font-semibold text-[#1E3A2A]">
                            Belum ada lokasi ditemukan.
                        </p>
                        <p class="mt-1 text-sm text-[#6B7A70]">
                            Data fasilitas akan ditampilkan setelah diverifikasi.
                        </p>
                    </div>
                `;
            } else {
                listContainer.innerHTML = hasil.map(item => `
                    <button
                        type="button"
                        class="w-full rounded-xl border border-[#E3E7E1] bg-white p-4 text-left transition hover:border-[#17803D]"
                        data-lat="${item.latitude}"
                        data-lng="${item.longitude}"
                    >
                        <p class="font-semibold text-[#1E3A2A]">
                            ${item.nama}
                        </p>
                        <p class="mt-1 text-xs text-[#17803D]">
                            ${item.kategori}
                        </p>
                        <p class="mt-1 text-sm text-[#6B7A70]">
                            ${item.alamat}
                        </p>
                    </button>
                `).join("");

                listContainer.querySelectorAll("button").forEach(button => {
                    button.addEventListener("click", () => {
                        const lat = Number(button.dataset.lat);
                        const lng = Number(button.dataset.lng);

                        map.setView([lat, lng], 15);
                    });
                });
            }
        }

        hasil.forEach(item => {
            if (
                Number.isFinite(Number(item.latitude)) &&
                Number.isFinite(Number(item.longitude))
            ) {
                L.marker([item.latitude, item.longitude])
                    .bindPopup(`
                        <strong>${item.nama}</strong><br>
                        ${item.kategori}<br>
                        ${item.alamat}
                    `)
                    .addTo(markerLayer);
            }
        });
    }

    filterKab?.addEventListener("change", renderPeta);
    filterKat?.addEventListener("change", renderPeta);
    inputCari?.addEventListener("input", renderPeta);

    btnLokasi?.addEventListener("click", () => {
        if (!navigator.geolocation) {
            alert("Browser kamu belum mendukung fitur lokasi.");
            return;
        }

        navigator.geolocation.getCurrentPosition(
            position => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;

                map.setView([lat, lng], 15);

                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup("Lokasi kamu")
                    .openPopup();
            },
            () => {
                alert("Lokasi tidak dapat diakses. Periksa izin lokasi browser.");
            }
        );
    });

    renderPeta();

    setTimeout(() => map.invalidateSize(), 300);
});