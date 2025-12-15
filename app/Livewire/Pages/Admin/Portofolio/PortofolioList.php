<?php

namespace App\Livewire\Pages\Admin\Portofolio;

use App\Models\Portofolio;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class PortofolioList extends Component
{
    use WithPagination;

    public $searchPortofolio = '';

    // Reset page ketika search berubah
    public function updatedSearchPortofolio()
    {
        $this->resetPage();
    }

    // Hapus Portofolio
    public function deletePortofolio($id)
    {
        $Portofolio = Portofolio::find($id);

        if (!$Portofolio) {
            $this->dispatch('delete-error', message: 'Data Portofolio tidak ditemukan!');
            return;
        }

        // Hapus file fisik jika ada
        if ($Portofolio->gambar) {
            $filePath = storage_path('app/public/img/portofolio/' . $Portofolio->gambar);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus record dari DB
        $Portofolio->delete();

        $this->dispatch('Port$Portofolio-deleted', id: $id);
    }


    #[Layout('layouts.app')]
    public function render()
    {
        $Portofolio = Portofolio::query()
            ->where('nama_project', 'like', "%{$this->searchPortofolio}%")
            ->orWhere('nama_customer', 'like', "%{$this->searchPortofolio}%")
            ->orWhere('link_url', 'like', "%{$this->searchPortofolio}%")
            ->orWhere('deskripsi', 'like', "%{$this->searchPortofolio}%")
            ->latest()
            ->paginate(10);

        return view('livewire.pages.admin.portofolio.portofolio-list', [
            'Portofolio' => $Portofolio,
        ]);
    }
}
