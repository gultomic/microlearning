<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Microlearning as ML;
use App\Models\Pembelajaran as PB;

class StudiIndex extends Component
{
    public $mcl;
    public $pbs = false;
    public $mat;

    public function mount($mcid)
    {
        $this->mcl = ML::with('pembelajaran')->find($mcid);
        $this->pbs = $this->mcl->pembelajaran->first();
        $this->mat = $this->pbs->materi->first()->id;
    }

    public function render()
    {
        return view('livewire.studi-index');
    }

    public function pembelajaran($pid)
    {
        $this->pbs = false;
        $this->pbs = PB::find($pid);
        $this->mat = $this->pbs->materi->first()->id;
    }
}
