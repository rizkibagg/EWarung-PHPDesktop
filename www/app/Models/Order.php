<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['nama', 'username', 'email', 'nomerhp', 'alamat', 'rtrw', 'kecamatan', 'kota', 'kodepos', 'tanggal', 'pembayaran', 'infoproduk', 'status', 'total_barang', 'total_harga', 'users_id', 'warung_id'];
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    public function warung(){
        return $this->belongsTo(Warung::class, 'warung_id');
    }
}
