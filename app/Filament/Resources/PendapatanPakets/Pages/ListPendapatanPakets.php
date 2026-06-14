<?php

namespace App\Filament\Resources\PendapatanPakets\Pages;

use App\Filament\Resources\PendapatanPakets\PendapatanPaketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendapatanPakets extends ListRecords
{
    protected static string $resource = PendapatanPaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
