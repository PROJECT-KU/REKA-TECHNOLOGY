<div>
    <form wire:submit.prevent="save" class="p-3">
        <div class="row g-3">

            <!-- Judul -->
            <div class="col-md-6">
                <label class="form-label">Judul Project <span class="text-danger">*</span></label>
                <input type="text" wire:model.defer="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    placeholder="Masukkan judul project...">

                @error('judul')
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

            <!-- Thumbnail -->
            <div class="col-md-12">
                <div class="row">

                    <!-- Input -->
                    <div class="col-md-6">
                        <label class="form-label">Thumbnail <span class="text-danger">*</span></label>
                        <input type="file" wire:model="thumbnail"
                            class="form-control @error('thumbnail') is-invalid @enderror"
                            accept="image/*">

                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Preview -->
                    <div class="col-md-6">
                        <label class="form-label d-block">Preview</label>

                        @if ($thumbnail)
                            {{-- Preview file baru --}}
                            <img src="{{ $thumbnail->temporaryUrl() }}"
                                class="img-thumbnail" style="max-height:200px;">
                        @elseif (!empty($existingThumbnail))
                            {{-- Thumbnail lama --}}
                            <img src="{{ asset('storage/img/project/' . $existingThumbnail) }}"
                                class="img-thumbnail" style="max-height:200px;">
                        @else
                            {{-- Placeholder --}}
                            <img src="https://via.placeholder.com/200x150?text=No+Thumbnail"
                                class="img-thumbnail" style="max-height:200px;">
                        @endif
                    </div>

                </div>
            </div>

            <!-- Caption -->
            <div class="col-12">
                <label class="form-label">Caption</label>
                <textarea wire:model.defer="caption" rows="3"
                        class="form-control @error('caption') is-invalid @enderror"
                        placeholder="Masukkan caption project..."></textarea>

                @error('caption')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Video URL -->
            <div class="col-12">
                <label class="form-label">Link Video (Opsional)</label>
                <input type="text" wire:model.defer="video_url"
                    class="form-control @error('video_url') is-invalid @enderror"
                    placeholder="Contoh: https://youtu.be/...">

                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Video File -->
            <div class="col-12">
                <label class="form-label">Upload Video (Opsional)</label>
                <input type="file" wire:model="video"
                    class="form-control @error('video') is-invalid @enderror"
                    accept="video/*">

                @error('video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if (!empty($existingVideo))
                    <p class="mt-2">
                        Video lama: <strong>{{ $existingVideo }}</strong>
                    </p>
                @endif
            </div>

        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-save me-1"></i>
                {{ isset($mode) && $mode === 'edit' ? 'Simpan Perubahan' : 'Tambah Data' }}
            </button>
        </div>
    </form>
</div>
