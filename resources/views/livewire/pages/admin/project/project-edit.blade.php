<div>
    <div class="d-flex mb-2 align-items-center justify-content-between">
        <h3>Edit Data Project</h3>
        @php
        $breadcrumbs = [
        ['name' => 'Beranda', 'url' => route('admin.dashboard')],
        ['name' => 'Data Project', 'url' => route('admin.project.index')],
        ['name' => 'Edit Data Project'],
        ];
        @endphp
        <x-breadcrumb :items="$breadcrumbs" />
    </div>

    <div class="card">
        <div class="card-body">
            <livewire:pages.admin.project.project-form :project="$project" />
        </div>
    </div>
</div>