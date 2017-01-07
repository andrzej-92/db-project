<?php

/**
 * Dev routes
 */
Route::group(['prefix' => '_dev'], function () {
    Route::get('/migrate', function () {
        DB::listen(
            function (\Illuminate\Database\Events\QueryExecuted $event) {
                var_dump($event->sql);
                if (str_contains($event->sql, 'create table')) {
                    \Log::debug($event->sql);
                    file_put_contents(storage_path('oracle.sql'), $event->sql .PHP_EOL, FILE_APPEND);
                }
            }
        );

        return Artisan::call('migrate');
    });

    Route::get('/migrate-rollback', function () {
        return Artisan::call('migrate:rollback');
    });

    Route::get('/migrate-refresh', function () {
        return Artisan::call('migrate:refresh');
    });

    Route::get('/db-seed', function () {
        return Artisan::call('db:seed');
    });


    Route::get('/ide-helper', function () {
        return Artisan::call('ide-helper:generate');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * Application main routes
 */
Route::group(['prefix' => 'sales', 'as' => 'sales.'], function () {
    Route::get('/', 'SalesController@index')->name('all');
    Route::get('/types', 'SalesController@types')->name('types');
    Route::get('/dates', 'SalesController@dates')->name('dates');
    Route::get('/places', 'SalesController@places')->name('places');
});

