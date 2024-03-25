<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;
use App\Models\Microlearning;
use Illuminate\Support\Facades\Auth;

class DaftarKelas extends Component
{
    public $list;
    public $mcl;

    public function mount()
    {
        $this->mcl = Microlearning::all();
        $this->list = Kelas::with('pembelajaran', 'status')
            ->where('user_id', Auth::user()->id)
            ->get();
    }

    public function render()
    {
        // dd($this->list);
        return view('livewire.daftar-kelas');
    }
}
