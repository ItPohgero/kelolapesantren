<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nama', 'code', 'password', 'alamat', 'user_id'];

    public function getRouteKeyName()
    {
        return $this->code;
    }

    public function relasis()
    {
        return $this->belongsToMany(Relasi::class);
    }

    public function tabungans()
    {
        return $this->hasMany(Tabungan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
