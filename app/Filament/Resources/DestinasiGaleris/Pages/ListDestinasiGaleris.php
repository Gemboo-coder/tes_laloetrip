<?php

namespace App\Filament\Resources\DestinasiGaleris\Pages;

use App\Filament\Resources\DestinasiGaleris\DestinasiGalerisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDestinasiGaleris extends ListRecords
{
    protected static string $resource = DestinasiGalerisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
