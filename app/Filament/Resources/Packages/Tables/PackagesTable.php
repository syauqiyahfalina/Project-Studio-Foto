<?php

namespace App\Filament\Resources\Packages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
           ->columns([
    Tables\Columns\ImageColumn::make('foto')
    ->label('Photo')
    ->disk('public')
    ->size(100),

    Tables\Columns\TextColumn::make('nama_paket')
        ->label('Package Name')
        ->searchable()
        ->sortable()
        ->weight('bold'),

    Tables\Columns\TextColumn::make('durasi')
        ->label('Duration')
        ->badge()
        ->color('info'),

    Tables\Columns\TextColumn::make('deskripsi')
        ->label('Description')
        ->limit(60)
        ->wrap(),

    Tables\Columns\TextColumn::make('harga')
        ->label('Price')
        ->money('IDR')
        ->sortable()
        ->badge()
        ->color('success'),

    Tables\Columns\TextColumn::make('created_at')
        ->label('Created At')
        ->date('d M Y'),
])
            
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}