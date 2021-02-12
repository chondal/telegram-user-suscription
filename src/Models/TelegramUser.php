<?php

namespace Chondal\TelegramUserSuscription\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(config('telegram-user.user_model'), 'author_id');
    }




}
