<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('user_id')
                    ->relationship(
                        'user',
                        'name'
                    )
                    ->required(),

                Select::make('paket_trip_id')
                    ->relationship(
                        'paketTrip',
                        'nama_paket'
                    )
                    ->required(),

                TextInput::make('rating')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5),

                Textarea::make('komentar')
                    ->columnSpanFull(),

            ]);
    }
}