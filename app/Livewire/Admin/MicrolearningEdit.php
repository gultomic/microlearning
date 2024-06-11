<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Microlearning;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class MicrolearningEdit extends Component
{
    public $microlearning;

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $hex;

    public function mount($mcid)
    {
        $this->microlearning = Microlearning::findOrFail($mcid);
        $this->title = $this->microlearning->judul;
        $this->hex = $this->microlearning->refs['color'];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.microlearning-edit');
    }

    public function save()
    {
        $this->validate();

        try {
            $this->microlearning->update([
                'judul' => $this->title,
                'refs' => [
                    'color' => $this->hex
                ]
            ]);

            session()->flash('success', 'Microlearning berhasil disimpan!');
        } catch (Execption $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->redirectRoute('admin.dashboard');
    }

    public function destroy()
    {
        try {
            $this->microlearning->delete();

            session()->flash('success', 'Microlearning berhasil dihapus!');
        } catch (Execption $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->redirectRoute('admin.dashboard');
    }
}
