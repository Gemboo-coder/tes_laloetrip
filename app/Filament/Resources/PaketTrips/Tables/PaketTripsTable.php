<?php

namespace App\Filament\Resources\PaketTrips\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaketTripsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('thumbnail')
                    ->label('Foto'),

                TextColumn::make('nama_paket')
                    ->searchable(),

                TextColumn::make('jenis_paket'),

                TextColumn::make('harga')
                    ->money('IDR'),

                TextColumn::make('durasi'),
                TextColumn::make('jumlah_destinasi'),

                TextColumn::make('created_at')
                    ->dateTime(),

            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}