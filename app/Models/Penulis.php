<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;


    protected $table = 'penulis';

    protected $primarykey = 'id';

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'alamat',
    ];


    // Mengaktifkan timestamps karena tabel memiliki kolom created_at dan updated_at
    public $timestamps = true;

    // Model Penulis.php
    public function buku()
    {
    return $this->hasMany(Buku::class);
    }
}
