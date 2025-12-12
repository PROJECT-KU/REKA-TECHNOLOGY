<?php

namespace App\Livewire\Pages\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ProjectEdit extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.project.project-edit', ['project' => $this->project,]);
    }
}
