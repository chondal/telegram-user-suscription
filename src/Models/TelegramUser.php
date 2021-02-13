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

    public function setObjectAttribute($value)
    {
        $this->attributes['object'] = json_encode($value);
    }

    public function getObjectAttribute($value)
    {
        return json_decode($value);
    }

}
