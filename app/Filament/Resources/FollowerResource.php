<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FollowerResource\Pages;
use App\Filament\Resources\FollowerResource\RelationManagers;
use App\Models\Follower;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FollowerResource extends Resource
{
    protected static ?string $model = Follower::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                Forms\Components\Select::make('follower_id')
                    ->label('Follower Name')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Follower::query()
                ->leftJoin('users as user', 'followers.user_id', '=', 'user.id')
                ->leftJoin('users as follower', 'followers.follower_id', '=', 'follower.id')
                ->select('followers.*', 'user.name as user_name', 'follower.name as follower_name')
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('follower.name')
                    ->label('Follower Name')
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
            'index' => Pages\ListFollowers::route('/'),
            'create' => Pages\CreateFollower::route('/create'),
            'view' => Pages\ViewFollower::route('/{record}'),
            'edit' => Pages\EditFollower::route('/{record}/edit'),
        ];
    }
}
