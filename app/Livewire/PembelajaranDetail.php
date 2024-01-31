<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Pembelajaran as PB;

class PembelajaranDetail extends Component
{
    #[Layout('layouts.app')]

    public $pmb;

    public function mount($pbid)
    {
        $this->pmb = PB::with('materi')->find($pbid);
    }

    public function render()
    {
        return view('livewire.pembelajaran-detail');
    }
}
