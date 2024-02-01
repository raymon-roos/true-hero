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
                Forms\Components\Select::make('hero_1_id')
                    ->label('First hero')
                    ->required()
                    ->live(onBlur: true)
                    ->default(request()->input('hero2'))
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search): array => Hero::search("%{$search}%")
                        ->pluck('hero_alias', 'id')
                        ->toArray()),
                Forms\Components\Select::make('hero_2_id')
                    ->label('First hero')
                    ->required()
                    ->live(onBlur: true)
                    ->default(request()->input('hero2'))
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search): array => Hero::search("%{$search}%")
                            ->pluck('hero_alias', 'id')
                            ->toArray()),
                Forms\Components\Select::make('winner_id')
                    ->label('Winner')
                    ->live(onBlur: true)
                    ->disabled(fn (Get $get) => empty($get('hero_1_id')) || empty($get('hero_2_id')))
                    ->options(fn (Get $get) => [
                        $get('hero_1_id') => Hero::find($get('hero_1_id'), 'hero_alias')?->hero_alias ?? 'choose participants first',
                        $get('hero_2_id') => Hero::find($get('hero_2_id'), 'hero_alias')?->hero_alias ?? 'choose participants first',
                    ]),
                Forms\Components\DateTimePicker::make('occurred_at')
                    ->seconds(false)
                    ->maxDate($now = now())
                    ->beforeOrEqual($now)
                    ->default($now),

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
