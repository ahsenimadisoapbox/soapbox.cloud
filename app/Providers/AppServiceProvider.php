<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\LegalPage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $legalPages = LegalPage::where('status', 1)
                ->orderBy('id', 'asc')
                ->get();

            $view->with('legalPages', $legalPages);
        });
        Paginator::useBootstrapFive();
    }
}
