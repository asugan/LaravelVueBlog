<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                Card::make()->columns(1)->schema([
                    Forms\Components\TextInput::make('title')->required()->label('Yazı Başlığı'),
                    Forms\Components\RichEditor::make('body')->required()->label('İçerik'),
                    FileUpload::make('image1')
                        ->image()
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1000')
                        ->imageResizeTargetHeight('500')
                        ->label('Kapak Resmi')
                        ->imagePreviewHeight('250')
                        ->directory('img')
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend('resim-');
                        }),
                    DatePicker::make('created_at')->displayFormat('d/m/Y'),
                    Select::make('category_name')
                        ->label('Kategori')
                        ->options([
                            'psikoloji' => 'Psikoloji',
                            'din' => 'Din'
                        ])
                        ->searchable()
                ])
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('created_at'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}