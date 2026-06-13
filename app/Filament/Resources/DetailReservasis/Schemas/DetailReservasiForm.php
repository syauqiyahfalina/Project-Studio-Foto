<?php

namespace App\Filament\Resources\DetailReservasis\Schemas;

use App\Models\Reservasi;
use App\Models\Fotografer;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class DetailReservasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('reservasi_id')
                    ->options(
                        Reservasi::pluck('tanggal_reservasi', 'id')
                    )
                    ->searchable()
                    ->required(),

                Select::make('fotografer_id')
                    ->options(
                        Fotografer::pluck('nama_fotografer', 'id')
                    )
                    ->searchable()
                    ->required(),

            ]);
    }
}