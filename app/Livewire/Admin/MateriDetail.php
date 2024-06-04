<?php

namespace App\Livewire\Admin;

use App\Models\Materi;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class MateriDetail extends Component
{
    public $materi;
    public $did;

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $ytid;

    #[Validate('required')]
    public $intro;

    public function mount($mid)
    {
        $this->materi = Materi::findOrFail($mid);

        $this->title = $this->materi->judul;

        $refs = json_decode($this->materi->refs, true);
        $this->intro = $refs[0]["intro"];
        $this->ytid = $refs[0]["link"];
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.materi-detail');
    }

    public function save()
    {
        $this->validate();

        try {
            $save = $this->materi->update([
                'judul' => $this->title,
                'refs' => [
                    [
                        'id' => 1,
                        'link' => $this->ytid,
                        'type' => 'youtube',
                        'intro' => $this->intro
                    ]
                ]
            ]);
            session()->flash('success', 'Berhasil mengubah materi!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->redirectRoute('admin.pmbj.detail', ['pbid' => $this->materi->pembelajaran_id]);
    }

    public function destroy()
    {
        $nomor = $this->materi->nomor;
        $jumlah_materi = $this->materi->pembelajaran->materi->count();

        try {
            if ($nomor < $jumlah_materi) {
                $compile = $this->materi->pembelajaran->materi()
                    ->where("nomor", ">", $nomor)->get();

                foreach ($compile as $key) {
                    $key->update([
                        "nomor" => $key->nomor - 1,
                    ]);
                }
            }

            $this->materi->delete();

            session()->flash('success', 'Berhasil menghapus materi!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->redirectRoute('admin.pmbj.detail', ['pbid' => $this->materi->pembelajaran_id]);
    }
}
