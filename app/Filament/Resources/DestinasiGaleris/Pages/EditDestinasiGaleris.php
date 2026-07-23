<?php

namespace App\Filament\Resources\DestinasiGaleris\Pages;

use App\Filament\Resources\DestinasiGaleris\DestinasiGalerisResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDestinasiGaleris extends EditRecord
{
    protected static string $resource = DestinasiGalerisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
