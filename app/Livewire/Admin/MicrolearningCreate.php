<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Microlearning;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class MicrolearningCreate extends Component
{
    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $hex;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.microlearning-create');
    }

    public function save()
    {
        $this->validate();

        Microlearning::create([
            'judul' => $this->title,
            'refs' => [
                'color' => $this->hex
            ]
        ]);

        session()->flash('success', 'Microlearning berhasil ditambahkan!');

        $this->redirectRoute('admin.dashboard');
    }
}
