<?php

namespace App\Providers;

use App\View\Composers\NavigationComposer;
use App\View\Composers\ProductsFilterComposer;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('partials.header', NavigationComposer::class);
        View::composer('products.index', ProductsFilterComposer::class);

        // Enforce a strong password policy application-wide
        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(); // checks against HaveIBeenPwned breach database
        });

        // Rate-limit login attempts: 5 per minute per email+IP pair
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)
                ->by($request->string('email')->lower().'|'.$request->ip());
        });
    }
}
