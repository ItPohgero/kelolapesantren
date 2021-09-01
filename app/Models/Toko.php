<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $fillable = ['hash', 'nama', 'pin', 'pemilik', 'phone', 'user_id'];

    public function tabungans()
    {
        return $this->hasMany(Tabungan::class);
    }
}
