<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pembelajaran;
use App\Models\Microlearning;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class PembelajaranCreate extends Component
{
    use WithFileUploads;

    public $ml;

    #[Validate('required')]
    public $num = 1;

    #[Validate('required')]
    public $title;

    #[Validate('image|max:1024')]
    public $image;

    public function mount($mcid)
    {
        $this->ml = Microlearning::findOrFail($mcid);

        $count = $this->ml->pembelajaran->count();

        if ($count > 0) {
            $lastNum = $this->ml->pembelajaran()->get()->sortByDesc('nomor')->first()->nomor;
            $this->num = $lastNum + 1;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.pembelajaran-create');
    }

    public function save()
    {
        $ext = $this->image->getClientOriginalExtension();
        $name = "paskerid" . Carbon::now()->format("Ymdhis.") . $ext;

        $this->image->storeAs(path: 'public/banners', name: $name);

        $this->validate();

        Pembelajaran::create([
            'microlearning_id' => $this->ml->id,
            'nomor' => $this->num,
            'judul' => $this->title,
            'refs' => [
                'image' => "/storage/banners/$name"
            ]
        ]);

        session()->flash('success', 'Pembelajaran berhasil ditambahkan!');

        $this->redirectRoute('admin.micl.detail', ['mcid' => $this->ml->id]);
    }
}
