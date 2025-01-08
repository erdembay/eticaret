<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RateLimitServiceProvider::class,
     // RateLimitServiceProvider sınıfını ekledik.
    Spatie\Permission\PermissionServiceProvider::class,
];
