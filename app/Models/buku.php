<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $table = 'buku';// Menentukan nama tabel di database

    protected $primaryKey = 'id';

    protected $fillable = [
        'penulis_id',
        'judul',
        'published_at',
    ];

    public $timestamps = true;

public function penulis()
{
    return $this->belongsTo(Penulis::class, 'penulis_id', 'id'); // Relasi ke tabel penulis
}

}
