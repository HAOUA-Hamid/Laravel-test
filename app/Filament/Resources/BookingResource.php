<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar'; 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name') 
                    ->required()
                    ->label('User'),
                Forms\Components\Select::make('property_id')
                    ->relationship('property', 'name') 
                    ->required()
                    ->label('Property'),
                Forms\Components\DatePicker::make('start_date')
                    ->required()
                    ->label('Start Date'),
                Forms\Components\DatePicker::make('end_date')
                    ->required()
                    ->afterOrEqual('start_date') 
                    ->label('End Date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label('User'),
                Tables\Columns\TextColumn::make('property.name')
                    ->searchable()
                    ->sortable()
                    ->label('Property'),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->label('Start Date'),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable()
                    ->label('End Date'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created At'),
            ])
            ->filters([
                Tables\Filters\Filter::make('upcoming')
                    ->query(fn ($query) => $query->where('start_date', '>=', now()))
                    ->label('Upcoming Bookings'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBookings::route('/'),
        ];
    }

    public static function getLabel(): ?string
    {
        return 'Booking';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Bookings';
    }
}