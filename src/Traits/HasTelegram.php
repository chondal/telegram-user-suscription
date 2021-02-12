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

}
