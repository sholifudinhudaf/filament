<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MakulResource\Pages;
use App\Models\Makul;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MakulResource extends Resource
{
    protected static ?string $model = Makul::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('kode_makul')
                    ->required()
                    ->unique()
                    ->maxLength(10),
                TextInput::make('nama_makul')
                    ->required()
                    ->maxLength(128),
                TextInput::make('sks')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(6),
                Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_makul')
                    ->label('Kode Makul')
                    ->sortable()
                    ->searchable(isGlobal: true),  // Global search for kode_makul
                TextColumn::make('nama_makul')
                    ->label('Nama Makul')
                    ->sortable()
                    ->searchable(isGlobal: true),  // Global search for nama_makul
                TextColumn::make('sks')
                    ->label('SKS')
                    ->sortable()
                    // Removed the searchable() method here, so it won't show a search input
                    ->searchable(false),  // No search input for sks
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    // Removed the searchable() method here, so it won't show a search input
                    ->searchable(false),  // No search input for deskripsi
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMakuls::route('/'),
            'create' => Pages\CreateMakul::route('/create'),
            'edit' => Pages\EditMakul::route('/{record}/edit'),
            'report' => Pages\MakulReport::route('/report'),
        ];
    }
}
