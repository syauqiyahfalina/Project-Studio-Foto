<?php

namespace App\Filament\Resources\Fotografers\Pages;

use App\Filament\Resources\Fotografers\FotograferResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFotografer extends EditRecord
{
    protected static string $resource = FotograferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
