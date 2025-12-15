<div>
    <form wire:submit.prevent="save" class="p-3">
        <div class="row g-3">
            <!-- Nama Paket -->
            <div class="col-md-6">
                <label for="nama_paket" class="form-label">Nama Paket <span class="text-danger">*</span></label>
                <input type="text" id="nama_paket" wire:model.defer="nama_paket"
                    class="form-control @error('nama_paket') is-invalid @enderror"
                    placeholder="Masukkan Nama Paket">
                @error('nama_paket')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="col-md-6">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select id="status" wire:model.defer="status"
                    class="form-select @error('status') is-invalid @enderror">
                    <option value="">-- Pilih Status --</option>
                    <option value="active">Active</option>
                    <option value="non-active">Non-Active</option>
                </select>
                @error('status')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Harga Awal -->
            <div class="col-md-4">
                <label for="harga_awal" class="form-label">Harga Awal <span class="text-danger">*</span></label>
                <input type="text" id="harga_awal" wire:model.defer="harga_awal"
                    class="form-control @error('harga_awal') is-invalid @enderror rupiah"
                    placeholder="Masukkan Harga Awal">
                @error('harga_awal')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Harga Promo -->
            <div class="col-md-4">
                <label for="harga_promo" class="form-label">Harga Promo <span class="text-danger">*</span></label>
                <input type="text" id="harga_promo" wire:model.defer="harga_promo"
                    class="form-control @error('harga_promo') is-invalid @enderror rupiah"
                    placeholder="Masukkan Harga Promo">
                @error('harga_promo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hemat -->
            <div class="col-md-4">
                <label for="hemat_persentase" class="form-label">Hemat</label>
                <div class="input-group">
                    <input type="text" id="hemat_persentase"
                        wire:model.defer="hemat_persentase"
                        class="form-control @error('hemat_persentase') is-invalid @enderror bg-secondary-subtle text-dark"
                        placeholder="Masukkan persentase" readonly>
                    <span class="input-group-text">%</span>
                </div>

                @error('hemat_persentase')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Best Price -->
            <div class="col-md-6">
                <label for="best_price" class="form-label">Best Price <span class="text-danger">*</span></label>
                <select id="best_price" wire:model.defer="best_price"
                    class="form-select @error('best_price') is-invalid @enderror">
                    <option value="">-- Pilih Best Price --</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                @error('best_price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Show Homepage -->
            <div class="col-md-6">
                <label for="show_homepage" class="form-label">Show Homepage <span class="text-danger">*</span></label>
                <select id="show_homepage" wire:model.defer="show_homepage"
                    class="form-select @error('show_homepage') is-invalid @enderror">
                    <option value="">-- Pilih Show Homepage --</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                @error('show_homepage')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="col-12">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <div class="border rounded p-2 @error('deskripsi') is-invalid @enderror" wire:ignore style="min-height: 100px;">
                    <div id="chip-container" class="d-flex flex-wrap gap-1 mb-2">
                        <!-- Chips will be added here dynamically -->
                    </div>
                    <input type="text" id="chip-input" class="form-control border-0 p-0" placeholder="Tambahkan tag dan tekan Enter" style="outline: none; box-shadow: none;">
                </div>
                <input type="hidden" wire:model.defer="deskripsi" id="deskripsi-hidden">
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Tombol -->
        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-send me-1"></i>
                {{ $this->mode === 'create' ? 'Tambah Data' : 'Simpan Perubahan' }}
            </button>
        </div>
    </form>

</div>

<!--================== FORMAT RUPIAH ==================-->
<script>
    document.querySelectorAll('.rupiah').forEach(function(input) {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, "");
            e.target.value = formatRupiah(value);

            hitungTotal(); // setiap kali input berubah, total dihitung ulang
        });
    });
</script>
<!--================== END ==================-->

<!--================== VIEW HEMAT PERSENTASE ==================-->
<script>
    function toNumber(value) {
        return parseFloat(value.replace(/[^0-9]/g, '')) || 0;
    }

    function updatePreview() {
        const awal = toNumber(document.getElementById('harga_awal').value);
        const promo = toNumber(document.getElementById('harga_promo').value);

        const el = document.getElementById('hemat_persentase');

        // Jika dua-duanya ada nilai
        if (awal > 0 && promo >= 0) {

            let hemat = 0;

            // Jika promo < awal, hitung normal
            if (promo < awal) {
                hemat = Math.round(((awal - promo) / awal) * 100);
            }

            // Jika promo == awal, hemat tetap 0
            if (promo === awal) {
                hemat = 0;
            }

            // Set ke input
            el.value = hemat;

            // Trigger Livewire biar tersimpan
            el.dispatchEvent(new Event('input'));

        } else {
            // Jika belum ada nilai, kosongkan
            el.value = "";
            el.dispatchEvent(new Event('input'));
        }
    }

    document.getElementById('harga_awal').addEventListener('input', updatePreview);
    document.getElementById('harga_promo').addEventListener('input', updatePreview);
</script>
<!--================== END ==================-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Chip script loaded'); // Debug: Pastikan script berjalan
        const chipInput = document.getElementById('chip-input');
        const chipContainer = document.getElementById('chip-container');
        const hiddenInput = document.getElementById('deskripsi-hidden');

        if (!chipInput || !chipContainer || !hiddenInput) {
            console.error('Elemen chip tidak ditemukan! Periksa ID HTML.');
            return;
        }

        let chips = [];

        // Load existing chips from hidden input
        if (hiddenInput.value) {
            chips = hiddenInput.value.split(',').map(tag => tag.trim()).filter(tag => tag);
            renderChips();
        }

        chipInput.addEventListener('keydown', function(e) {
            console.log('Key pressed:', e.key); // Debug: Lihat key yang ditekan
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                const value = chipInput.value.trim();
                console.log('Adding chip:', value); // Debug: Lihat nilai yang ditambahkan
                if (value && !chips.includes(value)) {
                    chips.push(value);
                    renderChips();
                    updateHiddenInput();
                }
                chipInput.value = '';
            }
        });

        function renderChips() {
            console.log('Rendering chips:', chips); // Debug: Lihat array chips
            chipContainer.innerHTML = '';
            chips.forEach((chip, index) => {
                const chipElement = document.createElement('span');
                chipElement.className = 'badge bg-primary d-flex align-items-center gap-1';
                chipElement.innerHTML = `
                ${chip}
                <button type="button" class="btn-close btn-close-white" aria-label="Remove" onclick="removeChip(${index})" style="font-size: 0.6rem;"></button>
            `;
                chipContainer.appendChild(chipElement);
            });
        }

        window.removeChip = function(index) {
            console.log('Removing chip at index:', index); // Debug: Lihat penghapusan
            chips.splice(index, 1);
            renderChips();
            updateHiddenInput();
        };

        function updateHiddenInput() {
            hiddenInput.value = chips.join(',');
            console.log('Hidden input updated:', hiddenInput.value); // Debug: Lihat nilai hidden
            hiddenInput.dispatchEvent(new Event('input', {
                bubbles: true
            })); // Trigger Livewire update
        }
    });
</script>