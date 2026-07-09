<?php

namespace App\Filament\Resources\Destinasis\Schemas;

use App\Models\PaketTrip;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DestinasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_destinasi')
                    ->required(),

                TextInput::make('kategori')
                    ->required(),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('deskripsi')
                    ->columnSpanFull(),

                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('paket')
                    ->required(),

                Select::make('paketTrips')
                    ->relationship(
                        name: 'paketTrips',
                        titleAttribute: 'nama_paket'
                    )
                    ->multiple()
                    ->preload(),

            ]);
    }
}