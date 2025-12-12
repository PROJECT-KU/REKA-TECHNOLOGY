<?php

namespace App\Livewire\Pages\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProjectForm extends Component
{
    use WithFileUploads;
    public ?Project $project = null;

    public $judul = '';
    public $thumbnail;
    public $existingThumbnail = null;
    public $caption = '';
    public $video;
    public $existingVideo = null;
    public $video_url = '';
    public $status = '';

    public $mode = 'create';

    public function mount()
    {
        if ($this->project) {
            $this->judul             = $this->project->judul;
            $this->existingThumbnail = $this->project->thumbnail;
            $this->caption           = $this->project->caption;
            $this->status            = $this->project->status;
            $this->existingVideo     = $this->project->video;
            $this->video_url         = $this->project->video_url;
            $this->mode                 = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'judul'      => 'required|min:3',
            'caption'    => 'nullable|string',
            'status'     => 'required|in:active,non-active',
            'video_url'  => 'nullable|string|max:255',
        ];

        $rules['thumbnail'] = $this->mode === 'create'
            ? 'required|image|mimes:png,jpg,jpeg|max:5120'
            : 'nullable|image|mimes:png,jpg,jpeg|max:5120';

        if ($this->video) {
            $rules['video'] = 'file|mimes:mp4,mkv,avi,webm|max:512000';
        }

        $this->validate($rules);

        if ($this->mode === 'create') {
            $this->createProject();
        } else {
            $this->updateProject();
        }
    }

    private function createProject()
    {
        try {
            $thumbName = null;
            if ($this->thumbnail) {
                $thumbName = 'thumb_' . rand(10000, 99999) . '.' . $this->thumbnail->getClientOriginalExtension();
                $this->thumbnail->storeAs('img/project', $thumbName, 'public');
            }

            $videoName = null;
            if ($this->video) {
                $videoName = 'video_' . rand(10000, 99999) . '.' . $this->video->getClientOriginalExtension();
                $this->video->storeAs('videos/project', $videoName, 'public');
            }

            Project::create([
                'judul'      => $this->judul,
                'thumbnail'  => $thumbName,
                'caption'    => $this->caption,
                'video_url'  => $this->video_url,
                'video'      => $videoName,
                'status'     => $this->status,
            ]);

            session()->flash('success', 'Data Project berhasil ditambahkan!');
            $this->dispatch('popup-success', message: 'Data Project berhasil ditambahkan!');
            return redirect()->route('admin.project.index');
        } catch (\Exception $e) {
            $this->dispatch('popup-error', message: 'Gagal: ' . $e->getMessage());
        }
    }

    private function updateProject()
    {
        try {
            $data = [
                'judul'     => $this->judul,
                'caption'   => $this->caption,
                'video_url' => $this->video_url,
                'status'    => $this->status,
            ];

            if ($this->thumbnail) {

                if ($this->existingThumbnail && Storage::disk('public')->exists('img/project/' . $this->existingThumbnail)) {
                    Storage::disk('public')->delete('img/project/' . $this->existingThumbnail);
                }

                $thumbName = 'thumb_' . rand(10000, 99999) . '.' . $this->thumbnail->getClientOriginalExtension();
                $this->thumbnail->storeAs('img/project', $thumbName, 'public');

                $data['thumbnail'] = $thumbName;
            }

            if ($this->video) {

                if ($this->existingVideo && Storage::disk('public')->exists('videos/project/' . $this->existingVideo)) {
                    Storage::disk('public')->delete('videos/project/' . $this->existingVideo);
                }

                $videoName = 'video_' . rand(10000, 99999) . '.' . $this->video->getClientOriginalExtension();
                $this->video->storeAs('videos/project', $videoName, 'public');

                $data['video'] = $videoName;
            }

            $this->project->update($data);

            session()->flash('success', 'Perubahan Data Project berhasil disimpan!');
            $this->dispatch('popup-success', message: 'Data Project berhasil disimpan!');
            return redirect()->route('admin.project.index');
        } catch (\Exception $e) {
            $this->dispatch('popup-error', message: 'Gagal: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->judul        = '';
        $this->thumbnail       = '';
        $this->caption    = '';
        $this->status       = '';
    }

    public function render()
    {
        return view('livewire.pages.admin.project.project-form');
    }
}
