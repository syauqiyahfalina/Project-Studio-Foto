<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class ReservasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                Select::make('paket_id')
                    ->relationship('paket', 'nama_paket')
                    ->required(),

                Select::make('studio_id')
                    ->relationship('studio', 'nama_studio')
                    ->required(),

                Select::make('fotografer_id')
                    ->relationship('fotografer', 'nama_fotografer')
                    ->required(),

                DatePicker::make('tanggal_reservasi')
                    ->required(),

                TimePicker::make('jam_mulai')
                    ->required(),

                TimePicker::make('jam_selesai')
                    ->required(),

                TextInput::make('total_harga')
                    ->numeric()
                    ->required(),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->required()
                    ->default('pending'),

            ]);
    }
}