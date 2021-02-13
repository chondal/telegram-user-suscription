<?php

namespace Chondal\TelegramUserSuscription;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Illuminate\Support\HtmlString;

class TelegramUserSuscription
{

    public $token;
    public $botName;

    public function __construct()
    {
        $this->botName = config('services.telegram-bot-api.name');
        $user = Auth::user();
        $date = new \DateTime();
        if (!$user->telegram) {
            $user->telegram()->create([
                'token' => $user->id . Str::random(5) . $date->getTimestamp(),
            ]);
        }
        $this->token = $user->telegram->token ?? null;
    }

    public function link()
    {
        return ($this->token) ? "https://t.me/" . $this->botName . "?start=USER@" . $this->token : '';
    }

    public function qr($width = 100)
    {
        if ($this->token) {
            $img = '<img width="' . $width . 'px" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https%3A%2F%2Ft.me/' . $this->botName . '?start=' . $this->token . '%2F&choe=UTF-8" alt="">';
            return new HtmlString($img);
        }
    }

    public function modal()
    {
        if ($this->token) {
            return view('TelegramUserSuscription::modal');
        }
    }

}
