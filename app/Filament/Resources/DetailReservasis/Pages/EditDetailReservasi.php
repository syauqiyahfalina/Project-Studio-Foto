<?php

namespace App\Filament\Resources\DetailReservasis\Pages;

use App\Filament\Resources\DetailReservasis\DetailReservasiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDetailReservasi extends EditRecord
{
    protected static string $resource = DetailReservasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
