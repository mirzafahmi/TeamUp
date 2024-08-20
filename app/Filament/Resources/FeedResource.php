<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedResource\Pages;
use App\Filament\Resources\FeedResource\RelationManagers;
use App\Models\Feed;
use App\Models\PlayMode;
use App\Models\PlayRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class FeedResource extends Resource
{
    protected static ?string $model = Feed::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $navigationGroup = 'Feed Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Details')
                ->description('Enter user name and description for feeds')
                ->schema([
                    Forms\Components\Select::make('user_id')
                        ->label('User Name')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\Textarea::make('content')
                        ->label('Feed Content'),
                ]),
                Forms\Components\Section::make('Sports Details')
                ->description('Enter sport details')
                ->schema([
                    Forms\Components\Select::make('sport_id')
                        ->relationship(name: 'sport', titleAttribute: 'name')
                        ->label('Sport Name')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set('play_mode_id', null);
                            $set('play_role_id', null);
                    })
                    ->required(),
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('play_level_id')
                            ->label('Play Level Name')
                            ->relationship(name: 'playLevel', titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('play_mode_id')
                            ->label('Play Mode Name')   
                            ->options(fn(Get $get): Collection => PlayMode::query()
                                ->where('sport_id', $get('sport_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
                ]),
                Forms\Components\Section::make('Event Details')
                    ->description('Enter event details')
                    ->schema([
                        Forms\Components\Select::make('event_location_id')
                            ->label('Event Location Name')
                            ->relationship(name: 'eventLocation', titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\DateTimePicker::make('event_date')
                            ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sport.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('playLevel.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('playMode.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->limit(40)
                    ->searchable(),
                Tables\Columns\TextColumn::make('eventLocation.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event_date')
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
            'index' => Pages\ListFeeds::route('/'),
            'create' => Pages\CreateFeed::route('/create'),
            'view' => Pages\ViewFeed::route('/{record}'),
            'edit' => Pages\EditFeed::route('/{record}/edit'),
        ];
    }
}
