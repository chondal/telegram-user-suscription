<?php

namespace Chondal\TelegramUserSuscription\Traits;

use Chondal\TelegramUserSuscription\Models\TelegramUser;

trait HasTelegram
{

    /**
     * Get the telegramUser associated with the HasTelegram
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function telegram()
    {
        return $this->hasOne(TelegramUser::class);
    }

    /**
     * Define si el usuario por el cual se pregunta, tiene o no.
     *
     * @return void
     */
    public function telegramActive()
    {
        if (is_null($this->telegram)) {
            return false;
        } else {
            if (is_null($this->telegram->chat_id)) {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * listado de usuarios con chat de telegram activo
     *
     * @param [type] $query
     * @return void
     */
    public function scopeTelegramers($query)
    {
        return $query->whereHas('telegram', function ($q) {
            $q->whereNotNull('chat_id');
        });
    }

}
