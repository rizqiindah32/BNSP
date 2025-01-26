<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasi';

    protected $fillable = [
        'Nama',
        'Email',
        'Tanggal_lahir',
        'nomor_telepon',
        'agama_id',
        'alamat',
        'buku_id'
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id'); // Relasi ke tabel agama
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
