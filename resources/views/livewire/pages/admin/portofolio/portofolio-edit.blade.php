<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Edit Data Portofolio</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Portofolio', 'url' => route('admin.Portofolio.index')],
        ['name' => 'Edit Data Portofolio'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />
    </div>

    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.portofolio.portofolio-form :Portofolio="$Portofolio" />
        </div>
    </div>
</div>