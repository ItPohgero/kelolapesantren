<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTabungan extends Model
{
    use HasFactory;
    protected $fillable = ['an', 'phone', 'code', 'password', 'user_id'];
}
