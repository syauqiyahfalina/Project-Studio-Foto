<?php

namespace App\Filament\Resources\DetailReservasis;

use App\Filament\Resources\DetailReservasis\Pages\CreateDetailReservasi;
use App\Filament\Resources\DetailReservasis\Pages\EditDetailReservasi;
use App\Filament\Resources\DetailReservasis\Pages\ListDetailReservasis;
use App\Filament\Resources\DetailReservasis\Pages\ViewDetailReservasi;
use App\Filament\Resources\DetailReservasis\Schemas\DetailReservasiForm;
use App\Filament\Resources\DetailReservasis\Schemas\DetailReservasiInfolist;
use App\Filament\Resources\DetailReservasis\Tables\DetailReservasisTable;
use App\Models\DetailReservasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetailReservasiResource extends Resource
{
    protected static ?string $model = DetailReservasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return DetailReservasiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DetailReservasiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetailReservasisTable::configure($table);
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
            'index' => ListDetailReservasis::route('/'),
            'create' => CreateDetailReservasi::route('/create'),
            'view' => ViewDetailReservasi::route('/{record}'),
            'edit' => EditDetailReservasi::route('/{record}/edit'),
        ];
    }
}
