<?php

namespace App\Livewire\Pages\Admin\CategoriesPrice;

use App\Models\CategoriesPrice;
use App\Models\Price;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class CategoriesPriceList extends Component
{
    use WithPagination;

    public $searchcategoriesPrice = '';

    // Reset page ketika search berubah
    public function updatedSearchCategoriesPrice()
    {
        $this->resetPage();
    }

    // Hapus Categories Price
    public function deleteCategoriesPrice($id)
    {
        $categoriesPrice = CategoriesPrice::find($id);

        if (!$categoriesPrice) {
            $this->dispatch('delete-error', message: 'Data kategori tidak ditemukan!');
            return;
        }

        // CEK APAKAH MASIH DIGUNAKAN
        if ($categoriesPrice->prices()->exists()) {
            $this->dispatch(
                'delete-error',
                message: 'Kategori tidak dapat dihapus karena masih digunakan oleh paket.'
            );
            return;
        }

        // HAPUS
        $categoriesPrice->delete();

        $this->dispatch('CategoriesPrice-deleted', id: $id);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $categoriesPrice = CategoriesPrice::query()
            ->where('categories', 'like', "%{$this->searchcategoriesPrice}%")
            ->latest()
            ->paginate(10);

        return view('livewire.pages.admin.categories-price.categories-price-list', [
            'CategoriesPrice' => $categoriesPrice,
        ]);
    }
}
