<?php

namespace App\Livewire;

use App\Models\Pembelajaran;
use App\Models\Microlearning;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\ImageColumn;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class PembelajaranTable extends LivewireTable
{
    protected string $model = Pembelajaran::class;

    #[Locked]
    public int $mcid;

    protected function query(): Builder
    {
        return $this->model()->query()
            ->where('microlearning_id', '=', $this->mcid);
    }

    protected function columns(): array
    {
        return [
            ImageColumn::make(__('Thumbnail'), 'refs->image'),
            Column::make(__('Nomor'), 'nomor')
                ->sortable(),
            Column::make(__('Judul'), 'judul')
                ->sortable()
                ->searchable(),
            Column::make(__('Mengikuti Kelas'), function (mixed $value, Model $model): int {
                return $model->kelas()->count();
            }),
                // ->sortable(),
                // ->searchable(),
            Column::make(__('Actions'), function (Model $model): string {
                return '
                    <a class="underline" href="/admin/pembelajaran/'.$model->getKey().'/show" wire:navigate>Edit</a>
                    <a class="underline" href="/admin/pembelajaran/'.$model->getKey().'/list" wire:navigate>Materi</a>
                ';
            })
                ->clickable(false)
                ->asHtml(),
        ];
    }

    // public function render()
    // {
    //     return view('livewire.pembelajaran-table');
    // }
}
