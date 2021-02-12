<?php

namespace Chondal\TelegramUserSuscription;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class TelegramUserSuscription
{


    public function getToken()
    {
       $user= Auth::user();
       $date = new \DateTime();
       if (!$user->telegram) {
           $user->telegram()->create([
               'token' => $user->id.Str::random(5).$date->getTimestamp()
           ]);
       }
       return $user->telegram->token;
    }

    public function linkAddTelegram()
    {
        $token = $this->getToken();
       return "https://t.me/".config('services.telegram-bot-api.name')."?start=USER@".$token;
    }



}