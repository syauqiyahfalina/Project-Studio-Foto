<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),

                TextColumn::make('paket.nama_paket')
                    ->label('Package')
                    ->searchable(),

                TextColumn::make('studio.nama_studio')
                    ->label('Studio')
                    ->searchable(),

                TextColumn::make('fotografer.nama_fotografer')
                    ->label('Photographer')
                    ->searchable(),

                TextColumn::make('tanggal_reservasi')
                    ->label('Reservation Date')
                    ->date(),

                TextColumn::make('jam_mulai')
                    ->label('Start Time'),

                TextColumn::make('jam_selesai')
                    ->label('End Time'),

                TextColumn::make('total_harga')
                    ->label('Total Price')
                    ->money('IDR'),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'dikonfirmasi',
                        'primary' => 'selesai',
                        'danger' => 'dibatalkan',
                    ]),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}