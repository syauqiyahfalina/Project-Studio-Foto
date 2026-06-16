<?php

namespace App\Filament\Resources\PendapatanPakets;

use App\Filament\Resources\PendapatanPakets\Pages\CreatePendapatanPaket;
use App\Filament\Resources\PendapatanPakets\Pages\EditPendapatanPaket;
use App\Filament\Resources\PendapatanPakets\Pages\ListPendapatanPakets;
use App\Filament\Resources\PendapatanPakets\Pages\ViewPendapatanPaket;
use App\Filament\Resources\PendapatanPakets\Schemas\PendapatanPaketForm;
use App\Filament\Resources\PendapatanPakets\Schemas\PendapatanPaketInfolist;
use App\Filament\Resources\PendapatanPakets\Tables\PendapatanPaketsTable;
use App\Models\PendapatanPaket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendapatanPaketResource extends Resource
{
    protected static ?string $model = PendapatanPaket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'income_paket';

    public static function form(Schema $schema): Schema
    {
        return PendapatanPaketForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PendapatanPaketInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PendapatanPaketsTable::configure($table);
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
            'index' => ListPendapatanPakets::route('/'),
            'create' => CreatePendapatanPaket::route('/create'),
            'view' => ViewPendapatanPaket::route('/{record}'),
            'edit' => EditPendapatanPaket::route('/{record}/edit'),
        ];
    }
}
