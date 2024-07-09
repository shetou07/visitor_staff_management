<?php
return [
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
    ],

    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    'security' => [
        'driver' => 'session',
        'provider' => 'securities',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
    'securities' => [
        'driver' => 'eloquent',
        'model' => App\Models\Security::class,
    ],
],

'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],

    'admins' => [
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],
    'securities' => [
        'provider' => 'securities',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],
],
'password_timeout' => 10800,
];