<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Data Paket</h3>
        @php
        $breadcrumbs = [['name' => 'Beranda', 'url' => route('admin.dashboard')], ['name' => 'Data Paket']];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="form-group position-relative has-icon-left w-50 w-lg-25">
                    <input wire:model.live.debounce.300ms="searchBanners" type="text" class="form-control"
                        placeholder="ketik Judul Banner, Status..">
                    <div class="form-control-icon">
                        <i class="bi bi-search" style="font-size: 14px;"></i>
                    </div>
                </div>
                <a wire:navigate href="{{ route('admin.Paket.create') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-plus-lg"></i>
                    <span>Tambah Data Paket</span>
                </a>
            </div>
            <div class="table-responsive">
                <table id="productTable" class="table table-striped align-middle nowrap" style="width:100%">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Paket</th>
                            <th>Harga Awal</th>
                            <th>Harga Promo</th>
                            <th>Best Price</th>
                            <th>Show Homepage</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Price as $item)
                        <tr style="text-align: center;">

                            <td class="text-truncate" style="max-width: 200px;">
                                {{ $item->nama_paket }}
                            </td>

                            <td class="text-truncate" style="max-width: 200px;">
                                {{ $item->harga_awal }}
                            </td>

                            <td class="text-truncate" style="max-width: 200px;">
                                {{ $item->harga_promo }}
                            </td>

                            <td class="text-truncate" style="max-width: 200px;">
                                {{ $item->best_price }}
                            </td>

                            <td class="text-truncate" style="max-width: 200px;">
                                {{ $item->show_homepage }}
                            </td>

                            <td class="text-center">
                                <span class="badge {{ $item->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <a wire:navigate href="{{ route('admin.Paket.edit', $item) }}"
                                    class="btn btn-warning btn-sm me-1"
                                    title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button"
                                    class="btn btn-danger btn-sm delete-Banners-btn"
                                    data-id="{{ $item->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                Belum ada data paket
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $Price->links('vendor.pagination') }}
            </div>
        </div>
    </div>
</div>

<!--================== SWEET ALERT DELETE ==================-->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.delete-Banners-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const BannersId = button.getAttribute('data-id');

                Swal.fire({
                    title: 'Yakin hapus Data Akun?',
                    text: "Data tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const livewireComponentId = button.closest('[wire\\:id]').getAttribute('wire:id');
                        Livewire.find(livewireComponentId).call('deleteBanners', BannersId);
                    }
                });
            });
        });

        window.addEventListener('Banners-deleted', () => {
            Swal.fire({
                title: 'Terhapus!',
                text: 'Data Akun berhasil dihapus.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        });

        window.addEventListener('delete-error', (e) => {
            Swal.fire({
                title: 'Gagal!',
                text: e.detail.message,
                icon: 'error'
            });
        });

    });
</script>
<!--================== END SWEET ALERT DELETE ==================-->