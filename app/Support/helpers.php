<?php

if (! function_exists('is_active')) {
    function is_active($routeName) {
        return starts_with($routeName, Route::currentRouteName());
    }
}

if (! function_exists('month_name')) {
    function month_name($index) {
        $months = [
            'Styczeń',
            'Luty',
            'Marzec',
            'Kwiecień',
            'Maj',
            'Czerwiec',
            'Lipiec',
            'Sierpień',
            'Wrzesień',
            'Październik',
            'Listopad',
            'Grudzien',
        ];
        return array_get($months, (int) ($index - 1));
    }
}