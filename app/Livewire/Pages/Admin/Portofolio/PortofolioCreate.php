<?php

namespace App\Livewire\Pages\Admin\Portofolio;

use Livewire\Component;
use Livewire\Attributes\Layout;

class PortofolioCreate extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.portofolio.portofolio-create');
    }
}
