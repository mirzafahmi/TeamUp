<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedPlayRoleResource\Pages;
use App\Filament\Resources\FeedPlayRoleResource\RelationManagers;
use App\Models\FeedPlayRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedPlayRoleResource extends Resource
{
    protected static ?string $model = FeedPlayRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('feed_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('play_role_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('spot_availability')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('feed_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('play_role_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('spot_availability')
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
            'index' => Pages\ListFeedPlayRoles::route('/'),
            'create' => Pages\CreateFeedPlayRole::route('/create'),
            'view' => Pages\ViewFeedPlayRole::route('/{record}'),
            'edit' => Pages\EditFeedPlayRole::route('/{record}/edit'),
        ];
    }
}
