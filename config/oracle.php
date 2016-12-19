<?php

return [
    'oracle' => [
        'driver'        => 'oracle',
        'tns' => '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521)) (CONNECT_DATA=(SERVICE_NAME=XE)))',
        'database'      => env('DB_DATABASE', ''),
        'username'      => env('DB_USERNAME', ''),
        'password'      => env('DB_PASSWORD', ''),
        'charset'       => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],


];
