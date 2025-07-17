<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationLabel = 'Pendaftaran';
    protected static ?string $pluralModelLabel = 'Data Pendaftar';
    protected static ?string $navigationGroup = 'PPDB';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')->required()->label('Nama Lengkap'),
            TextInput::make('email')->email()->required(),
            TextInput::make('no_hp')->label('Nomor HP')->required(),
            TextInput::make('alamat')->required(),
            TextInput::make('asal_sekolah')->label('Asal Sekolah')->nullable(),

            Select::make('jurusan')
                ->options([
                    'TJKT' => 'Teknik Jaringan Komputer & Telekomunikasi',
                    'PPLG' => 'Pengembangan Perangkan Lunak & Gim',
                    'AKL' => 'Akuntansi & Keuangan Lembaga',
                    'MPLB' => 'Manajemen Perkantoran & Layanan Bisnis',
                    'DKV' => 'Desain Komunikasi Visual',
                    'BDP' => 'Bisnis Dan Pemasaran',
                ])
                ->required(),

            TextInput::make('biaya')
                ->disabled()
                ->label('Biaya Pendaftaran')
                ->helperText('Otomatis berdasarkan jurusan yang dipilih.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('jurusan')->sortable(),
                TextColumn::make('asal_sekolah')->label('Asal Sekolah'),
                TextColumn::make('no_hp')->label('No HP'),
                TextColumn::make('created_at')->label('Tanggal Daftar')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
