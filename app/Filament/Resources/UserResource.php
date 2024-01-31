<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('username')
                ->unique()
                ->required(),
            Forms\Components\TextInput::make('email')
                ->email()
                ->unique()
                ->required(),
            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->visible(fn ($livewire) => $livewire instanceof Pages\CreateUser),
            Forms\Components\TextInput::make('first_name')
                ->required(),
            Forms\Components\TextInput::make('last_name')
                ->required(),
            Forms\Components\DatePicker::make('date_of_birth'),
            Forms\Components\TextInput::make('phone_number'),
            Forms\Components\Toggle::make('is_admin'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('username')->sortable(),
            Tables\Columns\TextColumn::make('email')->sortable(),
            Tables\Columns\TextColumn::make('first_name'),
            Tables\Columns\TextColumn::make('last_name'),
            Tables\Columns\ToggleColumn::make('is_admin')->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigation(): array
    {
        return [
            'label' => 'Users',
            'sort' => 1,
            'icon' => 'heroicon-o-users',
        ];
    }
}
