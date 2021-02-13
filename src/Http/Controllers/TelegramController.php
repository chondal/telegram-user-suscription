<?php

namespace Chondal\TelegramUserSuscription\Http\Controllers;

use App\Http\Controllers\Controller;
use Chondal\TelegramUserSuscription\Models\TelegramUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{

    protected $uri = "https://api.telegram.org:443/bot";

    public function process(Request $request)
    {
        try {
            $text = $request->result[0]['message']['text'];
            $chat_id = $request->result[0]['message']['chat']['id'];
            if (str_contains($text, 'USER@')) {
                $this->checkUser($request, $text, $chat_id);
            } else {
                return 'no se encontro user@';
            }

            return response()->json('ok', 200);
        } catch (\Exception $ex) {
            return response()->json("Error: {$ex->getMessage()}", 500);
        }
    }

    private function checkUser(Request $request, $text, $chat_id)
    {
        $token = explode("USER@", $text)[1];

        $t = TelegramUser::whereToken($token)->first();

        if ($t) {
            $t->update([
                'object' => $request->result,
                'chat_id' => $chat_id,
            ]);
            $this->sendMessage(config('telegram-user.message.success'), $chat_id);
        } else {
            $this->sendMessage(config('telegram-user.message.error'), $chat_id);
        }

    }

    private function sendMessage($text, $chat_id)
    {
        $url = $this->uri . config('services.telegram-bot-api.token') . '/sendMessage';
        $params = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => "Markdown",
        ];

        $send = Http::post($url, $params);

    }

}
