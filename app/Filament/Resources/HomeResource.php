<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeResource\Pages;
use App\Models\Home;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
class HomeResource extends Resource
 {
    protected static ?string $model = Home::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Home Pages';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create Home')
                    ->description('Create new home for you')
                    ->schema([
                        TextInput::make('title'),
                        TextInput::make('short_desc'),
                        FileUpload::make('hero_image')
                        ->directory('hero')
                        ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Meta')
                    ->description('Attachment for your home')
                    ->schema([
                        Textarea::make('vision'),
                        MarkdownEditor::make('mission'),
                    ]),
                Section::make('Other')
                    ->schema([
                        TextInput::make('link_youtube')->label('Youtube Link'),
                        FileUpload::make('logo')
                        ->directory('logo'),
                    ])->columns(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
