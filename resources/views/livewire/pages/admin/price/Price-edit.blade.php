<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Edit Data Paket</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Banner', 'url' => route('admin.Paket.index')],
        ['name' => 'Edit Data Paket'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />
    </div>

    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.Price.Price-form :price="$Price" />
        </div>
    </div>
</div>