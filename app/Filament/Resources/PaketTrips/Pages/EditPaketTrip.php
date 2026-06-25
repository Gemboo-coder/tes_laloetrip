<?php

namespace App\Filament\Resources\PaketTrips\Pages;

use App\Filament\Resources\PaketTrips\PaketTripResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPaketTrip extends EditRecord
{
    protected static string $resource = PaketTripResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
