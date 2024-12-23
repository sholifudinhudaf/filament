<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Pages\Page;
use App\Filament\Pages\MakulReport;
use App\Filament\Pages\DosenReport;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register custom pages in Filament
        Page::addPage(MakulReport::class);
        Page::addPage(DosenReport::class);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Any custom service registration
    }
}
