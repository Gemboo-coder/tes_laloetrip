<?php

namespace App\Filament\Resources\DestinasiGaleris\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;


class DestinasiGalerisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('destinasi_id')
                    ->relationship(
                        'destinasi',
                        'nama_destinasi'
                    )
                    ->required(),
                FileUpload::make('gambar')
                    ->image()
                    ->directory('destinasi_galeri')
                    ->required(),
            ]);
    }
}
