<?php

namespace App\Filament\Resources\DetailReservasis\Pages;

use App\Filament\Resources\DetailReservasis\DetailReservasiResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDetailReservasi extends ViewRecord
{
    protected static string $resource = DetailReservasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
