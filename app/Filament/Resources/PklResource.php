<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PklResource\Pages;
use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Industri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Siswa PKL';
    protected static ?string $navigationGroup = 'Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Pilih siswa lewat nama
                Forms\Components\Select::make('siswa_id')
                    ->label('Siswa')
                    ->relationship('siswa', 'nama')
                    ->searchable()
                    ->required(),

                // Pilih industri lewat nama
                Forms\Components\Select::make('industri_id')
                    ->label('Industri')
                    ->relationship('industri', 'nama')
                    ->searchable()
                    ->required(),

                // Pilih guru lewat nama
                Forms\Components\Select::make('guru_id')
                    ->label('Guru Pembimbing')
                    ->relationship('guru', 'nama')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('mulai')
                    ->required()
                    ->label('Tanggal Mulai PKL'),

                Forms\Components\DatePicker::make('selesai')
                    ->required()
                    ->label('Tanggal Selesai PKL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->label('Siswa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('industri.nama')
                    ->label('Industri')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Guru Pembimbing')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('mulai')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('selesai')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPkls::route('/'),
            'create' => Pages\CreatePkl::route('/create'),
            'edit' => Pages\EditPkl::route('/{record}/edit'),
        ];
    }
}
