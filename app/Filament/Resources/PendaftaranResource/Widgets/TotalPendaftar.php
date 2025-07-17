<?php

namespace App\Filament\Widgets;

use App\Models\Pendaftaran;
use Filament\Widgets\Widget;
use Filament\Actions\StaticAction as Action;

class TotalPendaftar extends Widget
{
    protected static string $view = 'filament.widgets.total-pendaftar';

    protected function getViewData(): array
    {
        return [
            'jumlah' => Pendaftaran::count(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Export Excel')
                ->url(route('export.pendaftaran')) // pastikan route ini sudah dibuat
                ->openUrlInNewTab()
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success'),
        ];
    }
}
