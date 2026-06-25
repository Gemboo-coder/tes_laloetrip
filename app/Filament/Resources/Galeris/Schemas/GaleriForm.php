<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('paket_trip_id')
                    ->relationship(
                        'paketTrip',
                        'nama_paket'
                    )
                    ->required(),

                TextInput::make('judul')
                    ->required(),

                TextInput::make('kategori')
                    ->required(),

                FileUpload::make('gambar')
                    ->image()
                    ->required(),

            ]);
    }
}