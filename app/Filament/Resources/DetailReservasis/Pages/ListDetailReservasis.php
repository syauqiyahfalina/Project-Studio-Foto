<?php

namespace App\Filament\Resources\DetailReservasis\Pages;

use App\Filament\Resources\DetailReservasis\DetailReservasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetailReservasis extends ListRecords
{
    protected static string $resource = DetailReservasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
