<?php

namespace App\Filament\Resources\Fotografers;

use App\Filament\Resources\Fotografers\Pages\CreateFotografer;
use App\Filament\Resources\Fotografers\Pages\EditFotografer;
use App\Filament\Resources\Fotografers\Pages\ListFotografers;
use App\Filament\Resources\Fotografers\Pages\ViewFotografer;
use App\Filament\Resources\Fotografers\Schemas\FotograferForm;
use App\Filament\Resources\Fotografers\Schemas\FotograferInfolist;
use App\Filament\Resources\Fotografers\Tables\FotografersTable;
use App\Models\Fotografer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FotograferResource extends Resource
{
    protected static ?string $model = Fotografer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_fotografer';

    public static function form(Schema $schema): Schema
    {
        return FotograferForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FotograferInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FotografersTable::configure($table);
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
            'index' => ListFotografers::route('/'),
            'create' => CreateFotografer::route('/create'),
            'view' => ViewFotografer::route('/{record}'),
            'edit' => EditFotografer::route('/{record}/edit'),
        ];
    }
}
