<?php

namespace App\Filament\Resources\DestinasiGaleris;

use App\Filament\Resources\DestinasiGaleris\Pages\CreateDestinasiGaleris;
use App\Filament\Resources\DestinasiGaleris\Pages\EditDestinasiGaleris;
use App\Filament\Resources\DestinasiGaleris\Pages\ListDestinasiGaleris;
use App\Filament\Resources\DestinasiGaleris\Schemas\DestinasiGalerisForm;
use App\Filament\Resources\DestinasiGaleris\Tables\DestinasiGalerisTable;
use App\Models\Destinasi_Galeris as DestinasiGaleri;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DestinasiGalerisResource extends Resource
{
    protected static ?string $model = DestinasiGaleri::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Destinasi Galeri';

    public static function form(Schema $schema): Schema
    {
        return DestinasiGalerisForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DestinasiGalerisTable::configure($table);
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
            'index' => ListDestinasiGaleris::route('/'),
            'create' => CreateDestinasiGaleris::route('/create'),
            'edit' => EditDestinasiGaleris::route('/{record}/edit'),
        ];
    }
}
