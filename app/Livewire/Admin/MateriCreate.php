<?php

namespace App\Livewire\Admin;

use App\Models\Materi;
use Livewire\Component;
use App\Models\Pembelajaran;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class MateriCreate extends Component
{
    public $pb;

    #[Validate('required')]
    public $num = 1;

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $ytid;

    #[Validate('required')]
    public $intro;

    public function mount($pbid)
    {
        $this->pb = Pembelajaran::findOrFail($pbid);

        $count = $this->pb->materi->count();

        if ($count > 0) {
            $lastNum = $this->pb->materi()->get()->sortByDesc('nomor')->first()->nomor;
            $this->num = $lastNum + 1;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.materi-create');
    }

    public function save()
    {
        $this->validate();

        Materi::create([
            'pembelajaran_id' => $this->pb->id,
            'nomor' => $this->num,
            'judul' => $this->title,
            'refs' => [
                [
                    'id' => 1,
                    'link' => $this->ytid,
                    'type' => 'youtube',
                    'intro' => $this->intro
                ]
            ]
        ]);

        session()->flash('success', 'Pembelajaran berhasil ditambahkan!');

        $this->redirectRoute('admin.pmbj.detail', ['pbid' => $this->pb->id]);
    }
}
