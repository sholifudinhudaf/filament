<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nip')
                    ->required()
                    ->unique()
                    ->maxLength(20),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                Select::make('jenis_kelamin')
                    ->options(Dosen::getJenisKelaminOptions())
                    ->required(),
                TextInput::make('alamat')
                    ->required()
                    ->maxLength(128),
                DatePicker::make('tanggal_lahir')
                    ->required(),
                TextInput::make('bidang_keahlian')
                    ->required()
                    ->maxLength(128),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nip')
                    ->label('NIP')
                    ->sortable()
                    ->searchable(isGlobal: true), // Global search for 'nip'
                TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(isGlobal: true), // Global search for 'nama'
                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->searchable(), // No 'isIndividual' or 'isGlobal' flag
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable(), // No 'isIndividual' or 'isGlobal' flag
                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                TextColumn::make('bidang_keahlian')
                    ->label('Bidang Keahlian')
                    ->searchable() // No 'isIndividual' or 'isGlobal' flag
                    ->sortable(),
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
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
            'report' => Pages\DosenReport::route('/report'),
        ];
    }
}
