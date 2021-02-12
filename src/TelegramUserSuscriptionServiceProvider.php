<?php

namespace Chondal\TelegramUserSuscription;

use Illuminate\Support\ServiceProvider;

class TelegramUserSuscriptionServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'TelegramUserSuscription');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'telegram-user-suscription-migrations');

        $this->publishes([
            __DIR__ . '/../resources/views/' => resource_path('views/vendor/TelegramUserSuscription'),
        ], 'telegram-user-suscription-views');
        $this->publishes([
            __DIR__ . '/../config/telegram-user.php' => base_path('config/telegram-user.php'),
        ], 'telegram-user-suscription-config');
    }

    public function register()
    {
        $this->app->bind('TelegramUserSuscription', function () {
            return new \Chondal\TelegramUserSuscription\TelegramUserSuscription;
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/telegram-user.php', 'telegram-user');
    }

}
