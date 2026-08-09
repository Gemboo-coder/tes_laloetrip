<?php

namespace App\Filament\Resources\DestinasiGaleris\Pages;

use App\Filament\Resources\DestinasiGaleris\DestinasiGalerisResource;
use App\Models\Destinasi_Galeris;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateDestinasiGaleris extends CreateRecord
{
    protected static string $resource = DestinasiGalerisResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $gambarList = $data['gambar'] ?? [];

        $first = null;

        foreach ($gambarList as $path) {
            $record = Destinasi_Galeris::create([
                'destinasi_id' => $data['destinasi_id'],
                'gambar' => $path,
            ]);

            $first ??= $record;
        }

        return $first;
    }
}