<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Proyek';

    protected static ?string $modelLabel = 'Proyek';

    protected static ?string $pluralModelLabel = 'Proyek';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TagsInput::make('stack')
                    ->label('Teknologi')
                    ->placeholder('Tambah teknologi lalu tekan enter'),
                Forms\Components\TextInput::make('github')
                    ->label('Tautan GitHub')
                    ->maxLength(255),
                Forms\Components\TextInput::make('live')
                    ->label('Tautan Live')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cover_path')
                    ->label('Gambar Sampul')
                    ->image()
                    ->directory('projects'),
                Forms\Components\Textarea::make('problem_id')
                    ->label('Masalah (Indonesia)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('problem_en')
                    ->label('Masalah (Inggris)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('solution_id')
                    ->label('Solusi (Indonesia)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('solution_en')
                    ->label('Solusi (Inggris)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('result_id')
                    ->label('Hasil (Indonesia)')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('result_en')
                    ->label('Hasil (Inggris)')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github')
                    ->label('GitHub')
                    ->searchable(),
                Tables\Columns\TextColumn::make('live')
                    ->label('Live')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover_path')
                    ->label('Sampul'),
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
            'index' => Pages\ManageProjects::route('/'),
        ];
    }
}
