<?php

namespace App\Filament\Resources\Payments\Schemas;

use App\Models\Reservasi;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembayaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('reservasi_id')
                    ->options(
                        Reservasi::all()->pluck('display_name', 'id')
                    )
                    ->searchable()
                    ->required(),

                DatePicker::make('tanggal_bayar'),

                TextInput::make('jumlah')
                    ->numeric()
                    ->required(),

                Select::make('metode_pembayaran')
                    ->options([
                        'Transfer Bank' => 'Transfer Bank',
                        'E-Wallet' => 'E-Wallet',
                        'Cash' => 'Cash',
                    ]),

                FileUpload::make('bukti_bayar')
                    ->directory('bukti-pembayaran'),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'dibayar' => 'Dibayar',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required(),

            ]);
    }
}