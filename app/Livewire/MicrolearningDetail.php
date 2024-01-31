<?php

namespace App\Livewire;


use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Microlearning as ML;

class MicrolearningDetail extends Component
{
    #[Layout('layouts.app')]

    public $mcl;
    public $mcid;

    public function mount($mcid)
    {
        $this->mcid = $mcid;
        $this->mcl = ML::with('pembelajaran')->find($mcid);
    }

    public function render()
    {
        return view('livewire.microlearning-detail');
    }
}
