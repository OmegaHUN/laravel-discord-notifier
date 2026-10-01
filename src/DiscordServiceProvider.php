<?php

namespace Triztan\DiscordNotifier;

use Illuminate\Support\ServiceProvider;

class DiscordServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/discord-notifier.php', 'discord-notifier'
        );

        $this->app->singleton('discord-notifier', function ($app) {
            return new DiscordNotifier();
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/discord-notifier.php' => config_path('discord-notifier.php'),
            ], 'discord-config');
        }
    }
}