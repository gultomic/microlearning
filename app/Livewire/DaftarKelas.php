<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DaftarKelas extends Component
{
    public $list;

    public function mount()
    {
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
