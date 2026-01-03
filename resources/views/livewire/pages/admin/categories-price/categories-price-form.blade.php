<div>
    <form wire:submit.prevent="save" class="p-3">
        <div class="row g-3">

            <!-- NAMA KATEGORI -->
            <div class="col-md-6">
                <label class="form-label">
                    Nama Kategori <span class="text-danger">*</span>
                </label>
                <input type="text" wire:model="categories" class="form-control @error('categories') is-invalid @enderror" placeholder="Contoh: Website Development">
                @error('categories')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- SLUG -->
            <div class="col-md-6">
                <label class="form-label">
                    Slug
                </label>
                <input type="text" wire:model="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="website-development" {{ $mode === 'create' ? 'readonly' : '' }} style=" {{ $mode === 'create' ? 'background:#f9fafb; cursor:not-allowed;': '' }}">
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- TOMBOL -->
            <div class="col-12 text-end mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>
                    {{ $mode === 'create' ? 'Tambah Kategori' : 'Simpan Perubahan' }}
                </button>
            </div>

        </div>
    </form>
</div>