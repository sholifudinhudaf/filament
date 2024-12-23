<?php

namespace App\Filament\Resources\MakulResource\Pages;

use App\Filament\Resources\MakulResource;
use App\Models\Makul;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Tables\Filters\SelectFilter;

class MakulReport extends Page implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    protected static string $resource = MakulResource::class;

    protected static string $view = 'filament.resources.makul-resource.pages.makul-report';

    protected static ?string $title = 'Laporan Data Mata Kuliah';

    public function table(Table $table): Table
    {
        return $table
            ->query(Makul::query())
            ->columns([
                TextColumn::make('kode_makul')
                    ->label('Kode Makul')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama_makul')
                    ->label('Nama Makul')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('sks')
                    ->label('SKS')
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('sks')
                    ->options([
                        '1' => '1 SKS',
                        '2' => '2 SKS',
                        '3' => '3 SKS',
                        '4' => '4 SKS',
                    ])
                    ->label('Jumlah SKS'),
            ])
            ->actions([
                // Add actions if needed
            ])
            ->bulkActions([
                // Add bulk actions if needed
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label('Cetak PDF')
                ->icon('heroicon-o-printer')
                ->url(fn () => route('makul.report.pdf'), true),
            Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-document-arrow-down')
                ->url(fn () => route('makul.report.excel'), true),
        ];
    }
}
