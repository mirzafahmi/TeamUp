<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayRoleResource\Pages;
use App\Filament\Resources\PlayRoleResource\RelationManagers;
use App\Models\PlayRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayRoleResource extends Resource
{
    protected static ?string $model = PlayRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Play Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sport_id')
                    ->label('Sport Name')
                    ->relationship(name: 'sport', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Play Role Name')
                    ->required(),
                Forms\Components\TextArea::make('description')
                    ->label('Play Role Description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sport.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->limit(40)
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
            'index' => Pages\ListPlayRoles::route('/'),
            'create' => Pages\CreatePlayRole::route('/create'),
            'view' => Pages\ViewPlayRole::route('/{record}'),
            'edit' => Pages\EditPlayRole::route('/{record}/edit'),
        ];
    }
}
