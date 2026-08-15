<?php

namespace App\Filament\Pages;

use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Profil';

    protected static ?string $title = 'Kelola Profil';

    protected static string $view = 'filament.pages.manage-profile';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Profile::current()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Umum')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('photo_path')
                            ->label('Foto')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1'])
                            ->imageEditorMode(2)
                            ->directory('profile')
                            ->helperText('Atur ulang crop foto agar wajah pas di tengah bingkai persegi.'),
                        Forms\Components\FileUpload::make('cv_path')
                            ->label('CV')
                            ->directory('profile')
                            ->acceptedFileTypes(['application/pdf']),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tentang')
                    ->schema([
                        Forms\Components\Textarea::make('about_p1_id')
                            ->label('Paragraf 1 (Indonesia)')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('about_p1_en')
                            ->label('Paragraf 1 (Inggris)')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('about_p2_id')
                            ->label('Paragraf 2 (Indonesia)')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('about_p2_en')
                            ->label('Paragraf 2 (Inggris)')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('stat_projects')
                            ->label('Statistik: Proyek'),
                        Forms\Components\TextInput::make('stat_years')
                            ->label('Statistik: Tahun'),
                        Forms\Components\TextInput::make('stat_remote')
                            ->label('Statistik: Remote'),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Kontak & Media Sosial')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email(),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->url(),
                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn')
                            ->url(),
                        Forms\Components\TextInput::make('github')
                            ->label('GitHub')
                            ->url(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Profile::current()->update($data);

        Notification::make()
            ->title('Profil tersimpan')
            ->success()
            ->send();
    }
}
