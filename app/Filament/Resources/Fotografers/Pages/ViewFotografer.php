<?php

namespace App\Filament\Resources\Fotografers\Pages;

use App\Filament\Resources\Fotografers\FotograferResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFotografer extends ViewRecord
{
    protected static string $resource = FotograferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
