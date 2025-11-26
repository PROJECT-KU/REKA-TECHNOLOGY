<?php

namespace App\Livewire\Pages\Admin\Portofolio;

use App\Models\Portofolio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PortofolioForm extends Component
{
    use WithFileUploads;
    public ?Portofolio $portofolio = null;

    public $nama_project = '';
    public $nama_customer = '';
    public $link_url = '';
    public $deskripsi = '';
    public $gambar;
    public $existingImage = null; // nama file lama di DB

    public $mode = 'create';

    public function mount()
    {
        if ($this->portofolio) {
            $this->nama_project         = $this->portofolio->nama_project;
            $this->nama_customer        = $this->portofolio->nama_customer;
            $this->link_url             = $this->portofolio->link_url;
            $this->deskripsi            = $this->portofolio->deskripsi;
            $this->existingImage        = $this->portofolio->gambar;
            $this->mode                 = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'nama_project'      => 'required|min:3',
            'nama_customer'     => 'required|min:3',
            'link_url'          => 'nullable|string|min:3',
            'deskripsi'         => 'required|min:3',
        ];

        if ($this->mode === 'create') {
            $rules['gambar'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
        } else {
            $rules['gambar'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }

        $this->validate($rules);

        if ($this->mode === 'create') {
            $this->createPortofolio();
        } else {
            $this->updatePortofolio();
        }
    }

    private function createPortofolio()
    {
        try {

            if (!$this->gambar) {
                throw new \Exception('File gambar tidak ditemukan.');
            }

            // generate nama otomatis
            $filename = $this->gambar->hashName();

            // simpan file ke storage/app/public/img/portofolio
            Storage::disk('public')->putFileAs(
                'img/portofolio',
                $this->gambar,
                $filename
            );

            // simpan ke DB
            Portofolio::create([
                'nama_project'  => $this->nama_project,
                'nama_customer' => $this->nama_customer,
                'link_url'      => $this->link_url,
                'deskripsi'     => $this->deskripsi,
                'gambar'        => $filename,
            ]);

            session()->flash('success', 'Data Portofolio berhasil ditambahkan!');
            $this->dispatch('Portofolio-created');
            $this->resetForm();

            return redirect()->route('admin.Portofolio.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan Data Portofolio: ' . $e->getMessage());
        }
    }

    private function updatePortofolio()
    {
        try {
            $data = [
                'nama_project'      => $this->nama_project,
                'nama_customer'     => $this->nama_customer,
                'link_url'          => $this->link_url,
                'deskripsi'         => $this->deskripsi,
            ];

            if ($this->gambar && is_object($this->gambar)) {

                if ($this->existingImage && Storage::disk('public')->exists('img/portofolio/' . $this->existingImage)) {
                    Storage::disk('public')->delete('img/portofolio/' . $this->existingImage);
                }

                $filename = $this->gambar->hashName();

                Storage::disk('public')->putFileAs(
                    'img/portofolio',
                    $this->gambar,
                    $filename
                );

                $data['gambar'] = $filename;
            }

            $this->portofolio->update($data);

            session()->flash('success', 'Perubahan Data Portofolio berhasil disimpan!');
            $this->dispatch('Portofolio-updated');
            $this->resetForm();

            return redirect()->route('admin.Portofolio.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengupdate Data Portofolio: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->nama_project         = '';
        $this->nama_customer        = '';
        $this->link_url             = '';
        $this->deskripsi            = '';
        $this->gambar               = '';
    }

    public function render()
    {
        return view('livewire.pages.admin.portofolio.portofolio-form');
    }
}
