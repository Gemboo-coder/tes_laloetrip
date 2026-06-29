<?php

namespace App\Filament\Resources\PaketTrips\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaketTripForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_paket')
                    ->required()
                    ->maxLength(255),

                Select::make('jenis_paket')
                    ->options([
                        'Open Trip' => 'Open Trip',
                        'Private Trip' => 'Private Trip',
                        'Family Trip' => 'Family Trip',
                    ])
                    ->required(),

                TextInput::make('harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                TextInput::make('durasi')
                    ->required(),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('deskripsi')
                    ->columnSpanFull(),

                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('paket')
                    ->required(),

             
            ]);
    }
}