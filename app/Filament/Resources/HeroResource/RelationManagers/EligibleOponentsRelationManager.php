<?php

namespace App\Filament\Resources\HeroResource\RelationManagers;

use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EligibleOponentsRelationManager extends RelationManager
{
    protected static string $relationship = 'eligibleOpponents';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hero_alias')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                // Brutal hack, avert your eyes!
                // This replaces the eloquent relation with a completely new query
                fn () => Hero::whereBetween('elo_rating', [
                    0.8 * $this->getOwnerRecord()->elo_rating,
                    1.2 * $this->getOwnerRecord()->elo_rating
                ])
                ->whereNot('id', $this->getOwnerRecord()->id)
            )
            ->recordTitleAttribute('hero_alias')
            ->columns([
                Tables\Columns\TextColumn::make('hero_alias'),
                Tables\Columns\TextColumn::make('elo_rating')
                    ->numeric(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
