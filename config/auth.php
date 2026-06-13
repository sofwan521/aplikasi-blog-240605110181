<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'penulis',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'penulis',
        ],
    ],

    'providers' => [
        'penulis' => [
            'driver' => 'eloquent',
            'model' => App\Models\Penulis::class,
        ],
    ],

    'passwords' => [
        'penulis' => [
            'provider' => 'penulis',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
