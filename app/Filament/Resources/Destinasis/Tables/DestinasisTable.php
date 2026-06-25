<?php

namespace App\Filament\Resources\Destinasis\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DestinasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('gambar'),

                TextColumn::make('nama_destinasi')
                    ->searchable(),

                TextColumn::make('kategori'),

                TextColumn::make('slug'),

            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}