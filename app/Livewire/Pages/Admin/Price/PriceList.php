<?php

namespace App\Livewire\Pages\Admin\Price;

use App\Models\Price;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class PriceList extends Component
{
    use WithPagination;

    public $searchPrice = '';

    // Reset page ketika search berubah
    public function updatedSearchPrice()
    {
        $this->resetPage();
    }

    // Hapus Price
    public function deletePrice($id)
    {
        $Price = Price::find($id);

        if (!$Price) {
            $this->dispatch('delete-error', message: 'Data Price tidak ditemukan!');
            return;
        }

        // Hapus record dari DB
        $Price->delete();

        $this->dispatch('Price-deleted', id: $id);
    }


    #[Layout('layouts.app')]
    public function render()
    {
        $Price = Price::query()
            ->where('nama_paket', 'like', "%{$this->searchPrice}%")
            ->orWhere('harga_awal', 'like', "%{$this->searchPrice}%")
            ->orWhere('harga_promo', 'like', "%{$this->searchPrice}%")
            ->orWhere('hemat_persentase', 'like', "%{$this->searchPrice}%")
            ->orWhere('best_price', 'like', "%{$this->searchPrice}%")
            ->orWhere('show_homepage', 'like', "%{$this->searchPrice}%")
            ->orWhere('deskripsi', 'like', "%{$this->searchPrice}%")
            ->orWhere('status', 'like', "%{$this->searchPrice}%")
            ->latest()
            ->paginate(10);

        return view('livewire.pages.admin.price.Price-list', [
            'Price' => $Price,
        ]);
    }
}
