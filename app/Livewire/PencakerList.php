<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class PencakerList extends LivewireTable
{
    protected string $model = User::class;

    protected function query(): Builder
    {
        return $this->model()->query()
            ->where('role', '=', 'user');
    }

    protected function columns(): array
    {
        return [
            Column::make(__('Nama'), 'name')
                ->sortable(),
            Column::make(__('Email'), 'email')
                ->sortable(),
            Column::make(__('Telepon'), 'refs->telp')
                ->sortable(),
                // ->searchable(),
            Column::make(__('Kelas'), function (mixed $value, Model $model): int {
                return $model->kelas()->count();
            }),
                // ->sortable(),
                // ->searchable(),
            // Column::make(__('Actions'), function (Model $model): string {
            //     return '<div class="flex">
            //         <a class="underline" href="#'.$model->getKey().'" wire:navigate>detail</a>
            //     </div>';
            // })
            //     ->clickable(false)
            //     ->asHtml(),
        ];
    }
}
