<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\UserRegisterEvent;
use App\Listeners\UserRegisterListener;

class AppServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserRegisterEvent::class => [
            UserRegisterListener::class,
        ],
    ];
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
}
