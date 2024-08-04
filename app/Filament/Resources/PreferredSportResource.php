<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreferredSportResource\Pages;
use App\Filament\Resources\PreferredSportResource\RelationManagers;
use App\Models\PreferredSport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PreferredSportResource extends Resource
{
    protected static ?string $model = PreferredSport::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';

    protected static ?string $navigationGroup = 'User Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User Name')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('sport_id')
                    ->label('Sport Name')
                    ->relationship(name: 'sports', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(PreferredSport::query()
                ->leftJoin('sports', 'preferred_sports.sport_id', '=', 'sports.id')
                ->leftJoin('users', 'preferred_sports.sport_id', '=', 'users.id')
                ->select('preferred_sports.*', 'sports.name as sport_name', 'users.name as user_name'))
            ->columns([
                Tables\Columns\TextColumn::make('user_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sport_name')
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
            'index' => Pages\ListPreferredSports::route('/'),
            'create' => Pages\CreatePreferredSport::route('/create'),
            'view' => Pages\ViewPreferredSport::route('/{record}'),
            'edit' => Pages\EditPreferredSport::route('/{record}/edit'),
        ];
    }
}
