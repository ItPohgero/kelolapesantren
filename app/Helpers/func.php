<?php

use App\Models\Santri;
use App\Models\TimeLine;

# Ringkasan User ID
if (!function_exists('userId')) {
    function userId()
    {
        return auth()->user()->id;
    }
}

# Create Time Line
if (!function_exists('TimeLine')) {
    function TimeLine($data)
    {
        TimeLine::create([
            'message'       => $data,
            'user_id'       => auth()->user()->id
        ]);
    }
}

# Chek santri yang bukan adminya
if (!function_exists('pondok')) {
    function pondok($colom)
    {
        return auth()->user()->pondoks->$colom ?? env('APP_NAME');
    }
}
# Cek status tabungan
if (!function_exists('status')) {
    function status($data)
    {
        return ($data == 1) ? 'Setor Tunai' : 'Tarik Tunai';
    }
}

# Cek berasal dari pondok mana
if (!function_exists('santri')) {
    function santri()
    {
        return session()->get('alpine');
    }
}
