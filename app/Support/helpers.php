<?php

if (! function_exists('is_active')) {
    function is_active($routeName) {
        return starts_with($routeName, Route::currentRouteName());
    }
}