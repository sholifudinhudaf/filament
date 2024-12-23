<?php

namespace App\Filament\Resources\MakulResource\Pages;

use App\Filament\Resources\MakulResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMakuls extends ListRecords
{
    protected static string $resource = MakulResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
