<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Edit Data KategoriPaket</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Kategori', 'url' => route('admin.categories-price.index')],
        ['name' => 'Edit Data Kategori Paket'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />
    </div>

    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.CategoriesPrice.CategoriesPriceForm :categories-price="$CategoriesPrice" />
        </div>
    </div>
</div>