<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Microlearning as ML;

class MicrolearningIndex extends Component
{
    public $micl;

    public function mount()
    {
        $this->micl = ML::query()->get();
    }

    public function render()
    {
        return view('livewire.microlearning-index');
    }
}
