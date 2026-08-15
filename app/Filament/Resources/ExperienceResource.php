<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Pengalaman';

    protected static ?string $modelLabel = 'Pengalaman';

    protected static ?string $pluralModelLabel = 'Pengalaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company')
                    ->label('Perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('role_id')
                    ->label('Jabatan (Indonesia)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('role_en')
                    ->label('Jabatan (Inggris)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('type_id')
                    ->label('Tipe Kerja (Indonesia)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('type_en')
                    ->label('Tipe Kerja (Inggris)')
                    ->columnSpanFull(),
                Forms\Components\TagsInput::make('points_id')
                    ->label('Poin (Indonesia)')
                    ->placeholder('Tambah poin lalu tekan enter'),
                Forms\Components\TagsInput::make('points_en')
                    ->label('Poin (Inggris)')
                    ->placeholder('Tambah poin lalu tekan enter'),
                Forms\Components\DatePicker::make('started_at')
                    ->label('Mulai'),
                Forms\Components\DatePicker::make('ended_at')
                    ->label('Selesai'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company')
                    ->label('Perusahaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('started_at')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ended_at')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManageExperiences::route('/'),
        ];
    }
}
