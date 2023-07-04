<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = ['nomorhp', 'alamat', 'pekerjaan', 'biodata', 'users_id'];
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
