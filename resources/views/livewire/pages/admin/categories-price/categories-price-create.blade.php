<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Tambah Data Kategori Paket</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Kategori Paket', 'url' => route('admin.categories-price.index')],
        ['name' => 'Tambah Data Kategori Paket'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />

    </div>
    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.CategoriesPrice.CategoriesPriceform />
        </div>
    </div>
</div>