<?php

namespace App\Filament\Resources\Studios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_studio')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kapasitas')
                    ->numeric()
                    ->required(),

                Textarea::make('deskripsi')
                    ->rows(4),

                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('studio')
                    ->visibility('public'),
                
                Select::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'maintenance' => 'Maintenance',
                        'nonaktif' => 'Nonaktif',
                    ])
                    ->required()
                    ->default('aktif'),
            ]);
    }
}