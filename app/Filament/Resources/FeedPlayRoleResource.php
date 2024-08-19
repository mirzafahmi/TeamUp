<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedPlayRoleResource\Pages;
use App\Filament\Resources\FeedPlayRoleResource\RelationManagers;
use App\Models\Feed;
use App\Models\FeedPlayRole;
use App\Models\PlayRole;
use App\Models\Sport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class FeedPlayRoleResource extends Resource
{
    protected static ?string $model = FeedPlayRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Feed Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('feed_id')
                    ->label('Feed Id')
                    ->relationship('feed', titleAttribute: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        // Find the feed and set the sport name
                        $feed = Feed::find($state);
                        $set('sport_name', $feed ? $feed->sport->name : null);
                        $set('sport_id', $feed ? $feed->sport_id : null);
                    }),
                Forms\Components\TextInput::make('sport_name')
                    ->label('Sport Name')
                    ->disabled() // Disable input, just for display
                    ->dehydrated(false) // Do not include this field in form submissions
                    ->reactive(),
                Forms\Components\Select::make('play_role_id')
                    ->label('Play Role Name')
                    ->options(function (callable $get) {
                        $sportId = $get('sport_id');
                        return PlayRole::where('sport_id', $sportId)->pluck('name', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('spot_availability')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('feed_id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('feed.sport.name')
                    ->label('Sport Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('playRole.name')
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
