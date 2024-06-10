<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pembelajaran;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class PembelajaranEdit extends Component
{
    use WithFileUploads;

    public $pmb;
    public $viewImg;

    #[Validate('required')]
    public $title;

    // #[Validate('image|max:1024')]
    public $image;

    public function mount($pbid)
    {
        $this->pmb = Pembelajaran::findOrFail($pbid);
        $this->title = $this->pmb->judul;
        $this->viewImg = $this->pmb->refs['image'];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.pembelajaran-edit');
    }

    function updatedImage()
    {
        $this->viewImg = $this->image->temporaryUrl();
    }

    public function save()
    {
        $this->validate();

        try {
            $data['judul'] = $this->title;

            if ($this->image) {
                $ext = $this->image->getClientOriginalExtension();
                $name = "paskerid" . Carbon::now()->format("Ymdhis.") . $ext;

                $this->image->storeAs(path: 'public/banners', name: $name);

                $data['refs'] = [
                    'image' => "/storage/banners/$name"
                ];
            }

            $this->pmb->update($data);

            session()->flash('success', 'Pembelajaran berhasil disimpan!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMEssage());
        }

        $this->redirectRoute('admin.pmbj.detail', ['pbid' => $this->pmb->id]);
    }
}
