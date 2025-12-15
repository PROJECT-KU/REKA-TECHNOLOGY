<?php

namespace App\Livewire\Pages\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class ProjectList extends Component
{
    use WithPagination;

    public $searchProject = '';

    // Reset page ketika search berubah
    public function updatedSearchProject()
    {
        $this->resetPage();
    }

    // Hapus Banners
    public function deleteProject($id)
    {
        $project = Project::find($id);

        if (!$project) {
            $this->dispatch('delete-error', message: 'Data Project tidak ditemukan!');
            return;
        }

        if ($project->thumbnail) {
            $thumbPath = 'img/project/' . $project->thumbnail;
            if (Storage::disk('public')->exists($thumbPath)) {
                Storage::disk('public')->delete($thumbPath);
            }
        }

        if ($project->video) {
            $videoPath = 'videos/project/' . $project->video;
            if (Storage::disk('public')->exists($videoPath)) {
                Storage::disk('public')->delete($videoPath);
            }
        }

        $project->delete();

        $this->dispatch('project-deleted', id: $id);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $Projects = Project::query()
            ->where('judul', 'like', "%{$this->searchProject}%")
            ->orWhere('caption', 'like', "%{$this->searchProject}%")
            ->orWhere('status', 'like', "%{$this->searchProject}%")
            ->latest()
            ->paginate(10);

        return view('livewire.pages.admin.project.project-list', ['Projects' => $Projects]);
    }
}
