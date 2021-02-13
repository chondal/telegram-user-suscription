<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Chondal\TelegramUserSuscription\Http\Controllers'], function () {
    Route::post('/telegram', 'TelegramController@process')
        ->name('telegram');

});
