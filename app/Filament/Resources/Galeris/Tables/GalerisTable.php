<?php

namespace App\Filament\Resources\Galeris\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalerisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('gambar'),

                TextColumn::make('judul'),

                TextColumn::make('kategori'),

                TextColumn::make('paketTrip.nama_paket')
                    ->label('Paket'),

            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}