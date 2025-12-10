<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Project</h3>

        @php
            $breadcrumbs = [
                ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                ['name' => 'Project']
            ];
        @endphp

        <x-breadcrumb :items="$breadcrumbs" />
    </div>

    <div class="card">
        <div class="card-body">

            <!-- Search + Tambah -->
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="form-group position-relative has-icon-left w-50 w-lg-25">
                    <input wire:model.live.debounce.300ms="searchProject" 
                        type="text" 
                        class="form-control"
                        placeholder="Ketik Judul Project...">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>

                <a wire:navigate href="{{ route('admin.project.create') }}" 
                   class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-plus-lg"></i> Tambah Project
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Thumbnail</th>
                            <th>Caption</th>
                            <th>Video</th>
                            <th>Link Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($Projects as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>

                            <!-- Thumbnail -->
                            <td>
                                @if ($item->thumbnail)
                                    <img src="{{ asset('storage/img/project/' . $item->thumbnail) }}"
                                        class="img-thumbnail"
                                        style="width:80px;cursor:pointer;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalThumbnail{{ $item->id }}">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif

                                <!-- Modal Thumbnail -->
                                <div class="modal fade" id="modalThumbnail{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('storage/img/project/' . $item->thumbnail) }}"
                                                    class="img-fluid rounded">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Caption -->
                            <td class="text-truncate" style="max-width:200px;">
                                {{ $item->caption }}
                            </td>

                            <!-- Video -->
                            <td>
                                @if ($item->video)
                                    <i class="bi bi-play-circle text-primary"
                                    style="font-size:22px; cursor:pointer"
                                    data-bs-toggle="modal"
                                    data-bs-target="#previewVideo{{ $item->id }}">
                                    </i>

                                    <!-- Modal -->
                                    <div class="modal fade" id="previewVideo{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Preview Video</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <video width="100%" controls>
                                                        <source src="{{ asset('storage/videos/project/' . $item->video) }}">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>

                            <!-- Link Url -->
                            <td class="text-truncate" style="max-width:100px;">
                                {{ $item->video_url }}
                            </td>

                            <!-- Status -->
                            <td>
                                <span class="badge {{ $item->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>

                            <!-- Action -->
                            <td>
                                <a wire:navigate 
                                href="{{ route('admin.project.edit', $item->id) }}"
                                class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <button class="btn btn-danger btn-sm delete-project-btn"
                                        data-id="{{ $item->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada data project.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $Projects->links('vendor.pagination') }}
            </div>
        </div>
    </div>
</div>


<!-- Swal Delete -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-project-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const projectId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Hapus Project?',
                text: 'Data tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then(result => {
                if (result.isConfirmed) {

                    const lwId = this.closest('[wire\\:id]').getAttribute('wire:id');

                    Livewire.find(lwId).call('deleteProject', projectId);
                }
            });
        });
    });

    window.addEventListener('project-deleted', () => {
        Swal.fire({
            title: 'Terhapus!',
            text: 'Project berhasil dihapus.',
            icon: 'success',
            timer: 1600,
            showConfirmButton: false
        });
    });

});
</script>
