<?php

namespace App\Filament\Resources\Fotografers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class FotograferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_fotografer')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('no_hp')
                    ->default(null),
                TextInput::make('spesialisasi')
                    ->required(),
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('fotografer')
                    ->visibility('public')
                    ->required(),
                ]);
    }
}
