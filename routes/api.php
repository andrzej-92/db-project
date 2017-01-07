<?php

Route::group(['prefix' => '/charts'], function () {
    Route::get('/', 'SalesController@index');
});
