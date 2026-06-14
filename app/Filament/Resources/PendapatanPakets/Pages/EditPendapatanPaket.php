<?php

namespace App\Filament\Resources\PendapatanPakets\Pages;

use App\Filament\Resources\PendapatanPakets\PendapatanPaketResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPendapatanPaket extends EditRecord
{
    protected static string $resource = PendapatanPaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
