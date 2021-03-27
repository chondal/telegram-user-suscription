<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Chondal\TelegramUserSuscription\Http\Controllers'], function () {
    Route::post('/telegram', 'TelegramController@process')
        ->name('telegram');

    Route::group(['middleware' => ['web', 'auth']], function () {
        Route::post('/telegram/suscribe', 'TelegramController@suscription')
            ->name('telegram.suscription');
    });

});
