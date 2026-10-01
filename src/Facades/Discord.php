<?php

namespace Triztan\DiscordNotifier\Facades;

use Illuminate\Support\Facades\Facade;

class Discord extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'discord-notifier';
    }
}