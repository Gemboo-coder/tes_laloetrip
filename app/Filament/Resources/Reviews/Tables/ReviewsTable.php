<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('user.name')
                    ->label('User'),

                TextColumn::make('paketTrip.nama_paket')
                    ->label('Paket'),

                TextColumn::make('rating'),

                TextColumn::make('komentar')
                    ->limit(50),

            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}