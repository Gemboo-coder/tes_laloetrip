<?php

namespace App\Filament\Resources\PaketTrips;

use App\Filament\Resources\PaketTrips\Pages\CreatePaketTrip;
use App\Filament\Resources\PaketTrips\Pages\EditPaketTrip;
use App\Filament\Resources\PaketTrips\Pages\ListPaketTrips;
use App\Filament\Resources\PaketTrips\Schemas\PaketTripForm;
use App\Filament\Resources\PaketTrips\Tables\PaketTripsTable;
use App\Models\PaketTrip;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PaketTripResource extends Resource
{
    protected static ?string $model = PaketTrip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Paket Trip';

    public static function form(Schema $schema): Schema
    {
        return PaketTripForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaketTripsTable::configure($table);
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
            'index' => ListPaketTrips::route('/'),
            'create' => CreatePaketTrip::route('/create'),
            'edit' => EditPaketTrip::route('/{record}/edit'),
        ];
    }
}
