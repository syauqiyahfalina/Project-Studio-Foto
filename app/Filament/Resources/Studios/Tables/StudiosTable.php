<?php

namespace App\Filament\Resources\Studios\Tables;

use Filament\Tables;
use Filament\Tables\Table;

class StudiosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                     ->disk('public')
                     ->label('Studio')
                     ->square()
                     ->size(100),
                Tables\Columns\TextColumn::make('nama_studio')
                    ->label('Studio Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kapasitas')
                    ->label('Capacity'),

                Tables\Columns\TextColumn::make('status')
                   ->badge()
                   ->colors([
                        'success' => 'aktif',
                        'warning' => 'maintenance',
                        'danger' => 'nonaktif',
              ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y'),
            ]);
    }
}