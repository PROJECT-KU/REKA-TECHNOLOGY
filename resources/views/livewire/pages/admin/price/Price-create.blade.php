<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Tambah Data Paket</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Paket', 'url' => route('admin.Paket.index')],
        ['name' => 'Tambah Data Paket'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />

    </div>
    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.Price.Price-form />
        </div>
    </div>
</div>