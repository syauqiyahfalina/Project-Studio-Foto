<?php

namespace App\Filament\Resources\Fotografers\Pages;

use App\Filament\Resources\Fotografers\FotograferResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFotografers extends ListRecords
{
    protected static string $resource = FotograferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
