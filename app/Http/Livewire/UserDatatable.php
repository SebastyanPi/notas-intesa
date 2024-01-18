<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserDatatable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Username", "username")
                ->sortable(),
            Column::make("Firstname", "firstname")
                ->sortable(),
            Column::make("Lastname", "lastname")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("City", "city")
                ->sortable(),
            Column::make("Country", "country")
                ->sortable(),
            Column::make("Postal", "postal")
                ->sortable(),
            Column::make("About", "about")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
