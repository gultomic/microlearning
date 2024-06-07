<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Pembelajaran as PB;

class PembelajaranDetail extends Component
{
    public $pmb;
    public $mcid;

    public function mount($pbid)
    {
        $this->pmb = PB::with('materi')->find($pbid);
        $this->mcid = $this->pmb->microlearning_id;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pembelajaran-detail');
    }

    public function destroy()
    {
        try {
            $this->pmb->delete();
            session()->flash('success', 'Berhasil menghapus pembelajaran!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->redirectRoute('admin.micl.detail', ['mcid' => $this->mcid]);
    }
}
