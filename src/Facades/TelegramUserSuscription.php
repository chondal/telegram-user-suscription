<?php

namespace Chondal\TelegramUserSuscription\Facades;

use Illuminate\Support\Facades\Facade;

class TelegramUserSuscription extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'TelegramUserSuscription';
    }
}
