<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_paket')
                    ->label('Package Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('harga')
                    ->label('Price')
                    ->numeric()
                    ->required(),

                TextInput::make('durasi')
                    ->label('Duration')
                    ->required()
                    ->maxLength(50),

                Textarea::make('deskripsi')
                    ->label('Description')
                    ->rows(4),

                FileUpload::make('foto')
                ->label('Photo')
                ->image()
                ->disk('public')
                ->directory('packages')
                ->visibility('public'),
                ]);
                }
}