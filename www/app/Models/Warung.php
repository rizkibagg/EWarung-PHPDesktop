<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Warung extends Model
{
    use HasFactory;
    protected $table = 'warung';
    protected $fillable = ['fotowarung', 'nama', 'nomorhp', 'alamat', 'kodepos', 'biodata', 'users_id'];
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
