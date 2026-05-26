<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Industry;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\LegalPage;
use App\Models\Module;

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
            $footerProducts = Module::where('is_live', 1)
                ->where('status', 1)
                ->orderBy('sort_order', 'asc')
                ->take(7)
                ->get();

            $view->with('footerProducts', $footerProducts);
        });


        View::composer('*', function ($view) {
            $legalPages = LegalPage::where('status', 1)
                ->orderBy('id', 'asc')
                ->get();

            $view->with('legalPages', $legalPages);
        });

        View::composer('*', function ($view) {

            $industriesMenu = Industry::latest()->get();

            $view->with('industriesMenu', $industriesMenu);

        });

        View::composer('*', function ($view) {

            $productCategories = Category::with([
                'modules' => function ($query) {

                    $query->orderBy('sort_order', 'asc');

                }
            ])
            ->orderBy('sort_order', 'asc')
            ->get();

            $view->with('productCategories', $productCategories);

        });

        Paginator::useBootstrapFive();
    }
}
