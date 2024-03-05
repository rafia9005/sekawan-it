<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alat extends Model
{
    use HasFactory;
    protected $table = "alat";
    protected $fillable = [
        'alat_kategori_id',
        'alat_nama',
        'alat_deskripsi',
        'alat_hargaperhari',
        'alat_stok'
    ];
    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'alat_kategori_id', 'id');
    }
}
