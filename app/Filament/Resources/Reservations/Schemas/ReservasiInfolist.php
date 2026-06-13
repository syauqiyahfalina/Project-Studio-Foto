<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReservasiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('user.name')
                    ->label('User'),

                TextEntry::make('paket.nama_paket')
                    ->label('Package'),

                TextEntry::make('studio.nama_studio')
                    ->label('Studio'),

                TextEntry::make('fotografer.nama_fotografer')
                    ->label('Photographer'),

                TextEntry::make('tanggal_reservasi')
                    ->label('Reservation Date')
                    ->date(),

                TextEntry::make('jam_mulai')
                    ->label('Start Time'),

                TextEntry::make('jam_selesai')
                    ->label('End Time'),

                TextEntry::make('total_harga')
                    ->label('Total Price'),

                TextEntry::make('status')
                    ->badge(),

                TextEntry::make('created_at')
                    ->dateTime(),

                TextEntry::make('updated_at')
                    ->dateTime(),

            ]);
    }
}