<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Action Login
     */

    public function chek()
    {
        $chek = Santri::whereCode(request('code'))->first();
        if ($chek) {
            if (Hash::check(request('password'), $chek->password)) {
                session()->put('alpine', $chek);
                return Redirect::route('santri.dashboard');
            } else {
                session()->flash('warning', 'Input kembali');
                session()->flash('password', 'Password anda salah');
                return back();
            }
        } else {
            session()->flash('warning', 'Input kembali');
            session()->flash('code', 'Code salah atau tidak terdaftar');
            return back();
        }
    }

    // menghapus session
    public function logout(Request $request)
    {
        $request->session()->forget('alpine');
        $request->session()->forget('toko');
        $request->session()->forget('tabungan');
        $request->session()->forget('user_tabungan');
        return redirect()->to('/');
    }
}
