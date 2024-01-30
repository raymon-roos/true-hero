<?php

namespace App\Filament\Resources;

use App\Enums\HeroRating;
use App\Filament\Resources\HeroResource\Pages;
use App\Filament\Resources\HeroResource\RelationManagers;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Components;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Components\TextInput::make('hero_alias'),
                Components\RichEditor::make('backstory'),
                Components\RichEditor::make('motivation'),
                Components\TextInput::make('emergency_contact'),
                Components\Select::make('hero_rating')
                    ->options(HeroRating::assocValues()),
                Components\TextInput::make('elo_rating')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('hero_alias'),
                Columns\TextColumn::make('backstory'),
                Columns\TextColumn::make('motivation'),
                Columns\TextColumn::make('emergency_contact'),
                Columns\TextColumn::make('elo_rating'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'view' => Pages\ViewHero::route('/{record}'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
