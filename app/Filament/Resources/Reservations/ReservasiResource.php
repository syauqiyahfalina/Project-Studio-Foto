<?php

namespace App\Filament\Resources\Reservations;

use App\Filament\Resources\Reservations\Pages\CreateReservasi;
use App\Filament\Resources\Reservations\Pages\EditReservasi;
use App\Filament\Resources\Reservations\Pages\ListReservasis;
use App\Filament\Resources\Reservations\Pages\ViewReservasi;
use App\Filament\Resources\Reservations\Schemas\ReservasiForm;
use App\Filament\Resources\Reservations\Schemas\ReservasiInfolist;
use App\Filament\Resources\Reservations\Tables\ReservasisTable;
use App\Models\Reservasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'status';

    public static function form(Schema $schema): Schema
    {
        return ReservasiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReservasiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReservasis::route('/'),
            'create' => CreateReservasi::route('/create'),
            'view' => ViewReservasi::route('/{record}'),
            'edit' => EditReservasi::route('/{record}/edit'),
        ];
    }
}
