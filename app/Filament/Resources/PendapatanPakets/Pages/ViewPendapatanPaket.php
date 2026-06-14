<?php

namespace App\Filament\Resources\PendapatanPakets\Pages;

use App\Filament\Resources\PendapatanPakets\PendapatanPaketResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPendapatanPaket extends ViewRecord
{
    protected static string $resource = PendapatanPaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
