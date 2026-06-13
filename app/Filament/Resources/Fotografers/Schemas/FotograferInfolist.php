<?php

namespace App\Filament\Resources\Fotografers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FotograferInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_fotografer'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('no_hp')
                    ->placeholder('-'),
                TextEntry::make('spesialisasi'),
                TextEntry::make('foto'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
