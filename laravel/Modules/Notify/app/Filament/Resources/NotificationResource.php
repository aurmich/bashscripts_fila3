<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\CreateNotification;
// use Modules\Notify\Filament\Resources\NotificationResource\RelationManagers;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\EditNotification;
// use Filament\Forms;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ListNotifications;
use Modules\Notify\Models\Notification;
use Modules\Xot\Filament\Resources\XotBaseResource;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotificationResource extends XotBaseResource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                ]
            );
    }



    public static function getRelations(): array
    {
        return [
            // RelationManagers
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNotifications::route('/'),
            'create' => CreateNotification::route('/create'),
            'edit' => EditNotification::route('/{record}/edit'),
        ];
    }
}
