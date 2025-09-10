<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //
    }
    protected function redirectTo()
{
    $role = Auth::user()->role;

    if ($role === 'admin') {
        return '/admin/dashboard';
    } elseif ($role === 'hrd') {
        return '/hrd/dashboard';
    }

    return '/home';
}

}
