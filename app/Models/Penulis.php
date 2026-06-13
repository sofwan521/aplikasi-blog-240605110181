<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Penulis extends Authenticatable
{
    protected $table = 'penulis';
    public $timestamps = false;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'user_name',
        'password',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Override auth field untuk login pakai user_name bukan email
    public function getAuthIdentifierName()
    {
        return 'user_name';
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_penulis');
    }
}
