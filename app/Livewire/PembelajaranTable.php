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
                ->sortable(),
                // ->searchable(),
            Column::make(__('Materi'), function (mixed $value, Model $model): int {
                return $model->materi()->count();
            }),
            Column::make(__('Mengikuti Kelas'), function (mixed $value, Model $model): int {
                return $model->kelas()->count();
            }),
                // ->sortable(),
                // ->searchable(),
            Column::make(__('Actions'), function (Model $model): string {
                return '<div class="flex gap-2">
                    <a class="text-blue-500" href="/admin/pembelajaran/'.$model->getKey().'/list" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </a>
                    <a class="text-orange-500" href="/admin/pembelajaran/'.$model->getKey().'/show" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>';
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
