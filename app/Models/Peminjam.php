<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Peminjam extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', // Menyembunyikan password agar tidak terlihat dalam output JSON
        'remember_token',// Token untuk "remember me" saat login
    ];
}
