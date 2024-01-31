<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Microlearning as ML;

class MicrolearningIndex extends Component
{
    public $micl;
    public $userList;

    public function mount()
    {
        $this->micl = ML::query()->get();
        $this->userList = User::where('role', '=', 'user')->orderByDesc('created_at')->get();
    }

    public function render()
    {
        return view('livewire.microlearning-index');
    }
}
