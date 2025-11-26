<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Tambah Data Portofolio</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Portofolio', 'url' => route('admin.Portofolio.index')],
        ['name' => 'Tambah Data Portofolio'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />

    </div>
    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.portofolio.portofolio-form />
        </div>
    </div>
</div>