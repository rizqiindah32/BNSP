<?php

return [

    'defaults' => [
        'guard' => 'web',  // Default guard yang digunakan adalah 'web'
        'passwords' => 'users',
    ],

'guards' => [
    'staff' => [
        'driver' => 'session',
        'provider' => 'staffs',
    ],
    'peminjam' => [
        'driver' => 'session',
        'provider' => 'staffs',
    ],
],

'providers' => [
    'staffs' => [
        'driver' => 'eloquent',
        'model' => App\Models\Staff::class,
    ],
],
'peminjams' => [
        'driver' => 'eloquent',
        'model' => App\Models\Peminjam::class,
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',  // Tabel untuk token reset password pengguna umum
            'expire' => 60,  // Expired dalam 60 menit
            'throttle' => 60,  // Cegah percobaan login yang berlebihan
        ],
        'staff' => [
            'provider' => 'staff',
            'table' => 'password_reset_tokens',  // Tabel untuk token reset password staff
            'expire' => 60,
            'throttle' => 60,
        ],
        'peminjam' => [
            'provider' => 'peminjam',
            'table' => 'password_reset_tokens',  // Tabel untuk token reset password peminjam
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,  // Timeout setelah 3 jam

];
