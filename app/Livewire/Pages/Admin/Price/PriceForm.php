<?php

namespace App\Livewire\Pages\Admin\Price;

use App\Models\Price;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PriceForm extends Component
{
    use WithFileUploads;
    public ?Price $price = null;

    public $nama_paket = '';
    public $harga_awal = '';
    public $harga_promo = '';
    public $hemat_persentase = '';
    public $best_price = '';
    public $show_homepage = '';
    public $deskripsi = '';
    public $status = '';

    public $mode = 'create';

    public function mount()
    {
        if ($this->price) {
            $this->nama_paket               = $this->price->nama_paket;
            $this->harga_awal               = $this->price->harga_awal;
            $this->harga_promo              = $this->price->harga_promo;
            $this->hemat_persentase         = $this->price->hemat_persentase;
            $this->best_price               = $this->price->best_price;
            $this->show_homepage            = $this->price->show_homepage;
            $this->deskripsi                = $this->price->deskripsi;
            $this->status                   = $this->price->status;
            $this->mode                     = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'nama_paket'            => 'required|min:3',
            'harga_awal'            => 'required|min:1',
            'harga_promo'           => 'required|min:1',
            'best_price'            => 'required|in:yes,no',
            'show_homepage'         => 'required|in:yes,no',
            'deskripsi'             => 'nullable|string',
            'status'                => 'required|in:active,non-active',
        ];

        $this->validate($rules);

        if ($this->mode === 'create') {
            $this->createPrice();
        } else {
            $this->updatePrice();
        }
    }

    private function createPrice()
    {
        try {

            Price::create([
                'nama_paket'            => $this->nama_paket,
                'harga_awal'            => $this->harga_awal,
                'harga_promo'           => $this->harga_promo, // ← sudah benar
                'hemat_persentase'      => $this->hemat_persentase,
                'best_price'            => $this->best_price,
                'show_homepage'         => $this->show_homepage,
                'deskripsi'             => $this->deskripsi,
                'status'                => $this->status,
            ]);

            session()->flash('success', 'Data Paket berhasil ditambahkan!');
            $this->dispatch('Price-created');
            $this->resetForm();

            return redirect()->route('admin.Paket.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan Data Paket: ' . $e->getMessage());
        }
    }

    private function updatePrice()
    {
        try {
            $data = [
                'nama_paket'            => $this->nama_paket,
                'harga_awal'            => $this->harga_awal,
                'harga_promo'           => $this->harga_promo,
                'hemat_persentase'      => $this->hemat_persentase,
                'best_price'            => $this->best_price,
                'show_homepage'         => $this->show_homepage,
                'deskripsi'             => $this->deskripsi,
                'status'                => $this->status,
            ];

            $this->price->update($data);

            session()->flash('success', 'Perubahan Data Paket berhasil disimpan!');
            $this->dispatch('Price-updated');
            $this->resetForm();

            return redirect()->route('admin.Paket.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengupdate Data Paket: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->nama_paket           = '';
        $this->harga_awal           = '';
        $this->harga_promo          = '';
        $this->hemat_persentase     = '';
        $this->best_price           = '';
        $this->show_homepage        = '';
        $this->deskripsi            = '';
        $this->status               = '';
    }

    public function render()
    {
        return view('livewire.pages.admin.price.price-form');
    }
}
