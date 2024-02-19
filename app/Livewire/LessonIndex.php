<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;
use App\Models\Pembelajaran as PB;
use Illuminate\Support\Facades\Auth;

class LessonIndex extends Component
{
    public $pbid;
    public $pmb;
    public $material;
    public $arr;
    public $next;
    public $prev;
    public $index;
    public $kelas;

    public function mount($pbid, $material)
    {
        $this->pmb = PB::with('materi')->find($pbid);
        $this->arr = $this->pmb->materi->pluck('id')->toArray();
        $this->index = array_search($this->material, $this->arr);

        $this->userAssign($pbid);
        $this->navigation();
    }

    public function render()
    {
        $gyt = $this->getytid();
        return view('livewire.lesson-index', [
            'ytid' => $gyt->refs[0]['link'],
            'intro' => $gyt->refs[0]['intro'],
        ]);
    }

    public function getytid()
    {
        return $this->pmb->materi
            ->where('id', $this->material)
            ->first()
            // ->refs[0]['link']
            ;
    }

    public function navigation()
    {
        $indexActive = array_search($this->material, $this->arr);

        if($this->index == 0) {
            $this->prev = false;
        } else {
            $this->prev = $this->arr[$this->index - 1];
        }

        if($this->index + 1 == count($this->arr)) {
            $this->next = false;
        } else {
            $this->next = $this->arr[$this->index + 1];
        }
    }

    public function toPrev()
    {
        $this->redirectRoute("lesson.index", ['pbid' => $this->pbid, 'material' => $this->prev]);
    }

    public function toNext()
    {
        $this->redirectRoute("lesson.index", ['pbid' => $this->pbid, 'material' => $this->next]);
    }

    public function userAssign($pbid)
    {
        $user = Auth::user();
        $kelas = Kelas::where([
            ['user_id', $user->id],
            ['pembelajaran_id', $this->pbid],
        ])->first();

        if($kelas == null) {
            $kelas = Kelas::create([
                'user_id' => $user->id,
                'pembelajaran_id' => $this->pbid,
            ]);
        }

        $this->kelas = $kelas;
    }
}
