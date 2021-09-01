<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pondok extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'pengasuh', 'alamat', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
