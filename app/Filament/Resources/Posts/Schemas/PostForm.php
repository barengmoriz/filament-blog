<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostStatusEnum;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Eloquent\Model;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        Section::make()
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->readOnly()
                                    ->unique(),
                                RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->required(),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required(),
                                Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),
                                Select::make('status')
                                    ->options(PostStatusEnum::class)
                                    ->visible(auth()->user()->can('Post Status'))
                                    ->hiddenOn('create'),
                                Toggle::make('request_review')
                                    ->label('Request Review')
                                    ->inline(false)
                                    ->visible(fn(Model $record) => $record->user_id === auth()->id())
                                    ->hiddenOn('create')
                            ]),
                    ])
            ]);
    }
}
