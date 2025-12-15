<?php

namespace App\Livewire\Pages\Public\Homepage;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.public.homepage', ['project' => Project::where('status', 'active')->get()]);
    }
}
