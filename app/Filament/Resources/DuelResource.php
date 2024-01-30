<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DuelResource\Pages;
use App\Filament\Resources\DuelResource\RelationManagers;
use App\Models\Duel;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class DuelResource extends Resource
{
    protected static ?string $model = Duel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('firstHero')
                    ->required()
                    ->live()
                    ->relationship(titleAttribute: 'hero_alias')
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search): array => Hero::search("%{$search}%")
                        ->pluck('hero_alias', 'id')
                        ->toArray()),
                Forms\Components\Select::make('secondHero')
                    ->required()
                    ->live()
                    ->relationship(titleAttribute: 'hero_alias')
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search): array => Hero::search("{$search}")
                            ->pluck('hero_alias', 'id')
                            ->toArray()),
                Forms\Components\Select::make('winner')
                    ->relationship(titleAttribute: 'hero_alias')
                    ->live()
                    ->options(fn (Get $get) => [
                        $get('firstHero') => Hero::find($get('firstHero'), 'hero_alias')->hero_alias,
                        $get('secondHero') => Hero::find($get('secondHero'), 'hero_alias')->hero_alias,
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_1_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hero_2_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('winner.id')
                    ->numeric()
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
            'index' => Pages\ListDuels::route('/'),
            'create' => Pages\CreateDuel::route('/create'),
            'view' => Pages\ViewDuel::route('/{record}'),
            'edit' => Pages\EditDuel::route('/{record}/edit'),
        ];
    }
}
