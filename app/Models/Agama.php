<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'agama'; // Nama tabel di database

    protected $fillable = ['nama']; // Kolom yang dapat diisi (fillable)

    // Relasi ke tabel registrasi (opsional, jika diperlukan)
    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'agama_id');
    }
}
