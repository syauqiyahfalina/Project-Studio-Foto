<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(100),

                Select::make('kategori')
                    ->options([
                        'Wedding' => 'Wedding',
                        'Prewedding' => 'Prewedding',
                        'Graduation' => 'Graduation',
                        'Family Portrait' => 'Family Portrait',
                        'Product Photography' => 'Product Photography',
                    ])
                    ->required(),

                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('galeri')
                    ->visibility('public')
                    ->required(),
            ]);         
    }
}
