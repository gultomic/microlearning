<?php

namespace App\Livewire;

use App\Models\Config;
use App\Models\Microlearning as ML;
use Livewire\Component;

class Landing extends Component
{
    public $body;
    public $mcl;

    public function mount()
    {
        $this->body = Config::where('identity', '=', 'landing')->first()->body['welcome'];
        $this->mcl = ML::with('pembelajaran')->get();
    }

    public function render()
    {
        // dd($this->body);
        return view('livewire.landing');
    }
}
