<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['namespace' => 'Chondal\TelegramUserSuscription\Http\Controllers'], function () {
        Route::post('/telegram', 'TelegramController@store')
            ->name('telegram');

    });
});
