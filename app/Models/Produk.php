<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'id_kategori_produk',
        'nama_produk',
        'stok',
        'harga_produk',
        'foto_produk',
    ];

    public function getFotoProdukAttribute()
    {
            $foto_produk = $this->attributes['foto_produk'] ?? null;

        if (empty($foto_produk)) {
            return null;
        }

        return Storage::url('produk/' . $foto_produk);
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori_produk');
    }
}
