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
                <textarea id="deskripsi" wire:model.defer="deskripsi" rows="3"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    placeholder="Masukkan deskripsi"></textarea>
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

        if (awal > 0 && promo > 0 && promo < awal) {
            let hemat = Math.round(((awal - promo) / awal) * 100);

            // Set ke input
            const el = document.getElementById('hemat_persentase');
            el.value = hemat;

            // 🔥 Wajib agar Livewire mendeteksi perubahan
            el.dispatchEvent(new Event('input'));
        } else {
            const el = document.getElementById('hemat_persentase');
            el.value = "";
            el.dispatchEvent(new Event('input'));
        }
    }

    document.getElementById('harga_awal').addEventListener('input', updatePreview);
    document.getElementById('harga_promo').addEventListener('input', updatePreview);
</script>
<!--================== END ==================-->