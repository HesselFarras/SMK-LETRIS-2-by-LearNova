<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonsultasiResource\Pages;
use App\Models\Konsultasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class KonsultasiResource extends Resource
{
    protected static ?string $model = Konsultasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Konsultasi Jurusan';
    protected static ?string $navigationGroup = 'Data Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')->label('Nama Lengkap')->required(),
            TextInput::make('kontak')->label('Kontak (Email/WA)')->required(),
            Select::make('jurusan')->required()->options([
                'TKJ' => 'Teknik Komputer dan Jaringan',
                'RPL' => 'Rekayasa Perangkat Lunak',
                'AKL' => 'Akuntansi dan Keuangan Lembaga',
                'PG'  => 'Pengembangan Gim',
            ]),
            Textarea::make('pertanyaan')->label('Pertanyaan')->rows(4)->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('kontak')->label('Kontak')->searchable(),
                TextColumn::make('jurusan')->sortable(),
                TextColumn::make('pertanyaan')->limit(40),
                TextColumn::make('created_at')->label('Tanggal')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKonsultasis::route('/'),
            'create' => Pages\CreateKonsultasi::route('/create'),
            'edit' => Pages\EditKonsultasi::route('/{record}/edit'),
        ];
    }
}
