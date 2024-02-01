<?php

namespace App\Filament\Resources\HeroResource\RelationManagers;

use App\Filament\Resources\DuelResource;
use App\Models\Duel;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

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
                // This replaces the eloquent relation for this relation manager
                // with a completely new query, regular query
                fn () => Hero::whereBetween('elo_rating', [
                    0.8 * $this->getOwnerRecord()->elo_rating,
                    1.2 * $this->getOwnerRecord()->elo_rating
                ])
                ->whereNot('id', $this->getOwnerRecord()->id)
            )
            ->recordTitleAttribute('hero_alias')
            ->columns([
                Tables\Columns\ImageColumn::make('profile_picture')
                    ->circular(),
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
                Tables\Actions\Action::make('add duel outcome')
                    ->form(fn (Hero $record) => [
                        Forms\Components\Select::make('firstHero')
                            ->disabled()
                            ->required()
                            ->options([ $this->ownerRecord->id => $this->ownerRecord->hero_alias ])
                            ->default($this->ownerRecord->id),
                        Forms\Components\Select::make('secondHero')
                            ->disabled()
                            ->required()
                            ->options([ $record->id => $record->hero_alias ])
                            ->default($record->id),
                        Forms\Components\Select::make('winner_id')
                            ->options([
                                '' => 'draw',
                                $this->ownerRecord->id => $this->ownerRecord->hero_alias,
                                $record->id => $record->hero_alias,
                            ])
                            ->default($record->id),
                    ])
                    ->action(function (array $data, Hero $record) {
                        Duel::create([
                        'hero_1_id' => $this->ownerRecord->id,
                        'hero_2_id' => $record->id,
                        'winner_id' => $data['winner_id'],
                        ]);
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
