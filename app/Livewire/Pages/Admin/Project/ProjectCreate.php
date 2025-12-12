<?php

namespace App\Livewire\Pages\Admin\Project;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ProjectCreate extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.project.project-create');
    }
}
