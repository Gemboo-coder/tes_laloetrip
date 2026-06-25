<?php

namespace App\Filament\Resources\PaketTrips\Pages;

use App\Filament\Resources\PaketTrips\PaketTripResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPaketTrips extends ListRecords
{
    protected static string $resource = PaketTripResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
