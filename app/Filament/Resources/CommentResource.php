<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationGroup = 'Feed Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Comment Details')
                ->description('Enter feeds id and user name for comment')
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('feed_id')
                        ->label('Feed ID')
                        ->relationship(name: 'feed', titleAttribute: 'id')
                        ->searchable()
                        ->preload()
                        ->required(),
                        Forms\Components\Select::make('user_id')
                        ->label('User Name')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    ]),
                    Forms\Components\TextArea::make('content')
                    ->label('Comment Content')
                    ->required(),
                    Forms\Components\Toggle::make('request_to_join')
                    ->required(),
                ]),
                Forms\Components\Section::make('Owner feedback Details')
                ->description('Team up join status')
                ->schema([
                    Forms\Components\TextInput::make('status'),
                    Forms\Components\Toggle::make('is_read')
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
                Tables\Columns\TextColumn::make('feed_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\IconColumn::make('request_to_join')
                    ->boolean(),
                Tables\Columns\TextColumn::make('joinStatus.name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'view' => Pages\ViewComment::route('/{record}'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
