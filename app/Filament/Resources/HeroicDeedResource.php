<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroicDeedResource\Pages;
use App\Filament\Resources\HeroicDeedResource\RelationManagers;
use App\Models\HeroicDeed;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroicDeedResource extends Resource
{
    protected static ?string $model = HeroicDeed::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('hero_id')
                    ->relationship('hero', 'hero_alias')
                    ->required(),
                Forms\Components\Select::make('threat_id')
                    ->relationship('threat', 'name')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(50000)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('performed_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('hero.profile_picture')
                    ->circular(),
                Tables\Columns\TextColumn::make('hero.hero_alias')
                    ->label('Alias')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('threat.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('threat.level')
                    ->label('Threat level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('performed_at')
                    ->dateTime()
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
            'index' => Pages\ListHeroicDeeds::route('/'),
            'create' => Pages\CreateHeroicDeed::route('/create'),
            'view' => Pages\ViewHeroicDeed::route('/{record}'),
            'edit' => Pages\EditHeroicDeed::route('/{record}/edit'),
        ];
    }
}
