<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $fillable = ['invoice', 'santri_id', 'desc', 'status', 'nominal', 'toko_id', 'user_id'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
