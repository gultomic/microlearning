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
                    <a class="flex items-center gap-x-1" href="/admin/pembelajaran/'.$model->getKey().'/list" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-sm font-light">Detail</span>
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
