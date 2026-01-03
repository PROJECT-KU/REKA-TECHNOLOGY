<?php

namespace App\Livewire\Pages\Admin\CategoriesPrice;

use App\Models\CategoriesPrice;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoriesPriceForm extends Component
{
    public ?CategoriesPrice $categoriesPrice = null;

    public $categories = '';
    public $slug = '';
    public $mode = 'create';

    public function mount()
    {
        if ($this->categoriesPrice) {
            $this->categories = $this->categoriesPrice->categories;
            $this->slug       = $this->categoriesPrice->slug;
            $this->mode       = 'edit';
        }
    }

    /**
     * AUTO GENERATE SLUG
     * Dipanggil otomatis oleh Livewire
     */
    public function updatedCategories($value)
    {
        // Hanya auto-generate saat CREATE
        if ($this->mode === 'create') {
            $this->slug = Str::slug($value);
        }
    }

    public function save()
    {
        $rules = [
            'categories' => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:categories_price,slug,' . optional($this->categoriesPrice)->id,
        ];

        $this->validate($rules);

        if ($this->mode === 'create') {
            $this->createCategoriesPrice();
        } else {
            $this->updateCategoriesPrice();
        }
    }

    private function createCategoriesPrice()
    {
        CategoriesPrice::create([
            'categories' => $this->categories,
            'slug'       => $this->slug,
        ]);

        session()->flash('success', 'Kategori berhasil ditambahkan');
        return redirect()->route('admin.categories-price.index');
    }

    private function updateCategoriesPrice()
    {
        $this->categoriesPrice->update([
            'categories' => $this->categories,
            'slug'       => $this->slug,
        ]);

        session()->flash('success', 'Kategori berhasil diperbarui');
        return redirect()->route('admin.categories-price.index');
    }

    public function render()
    {
        return view('livewire.pages.admin.categories-price.categories-price-form');
    }
}
