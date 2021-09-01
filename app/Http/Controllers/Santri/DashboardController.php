<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('santri.dashboard', [
            'plus'          => Tabungan::whereSantri_id(santri()->id)->whereStatus(1)->sum('nominal'),
            'minus'         => Tabungan::wheresantri_id(santri()->id)->whereStatus(0)->sum('nominal'),
        ]);
    }

    /**
     * Report
     * History Tabungan
     * Tunggakan
     * Lunas
     */
    public function report()
    {
        return view('santri.report', [
            'tabungan'      => Tabungan::whereNull('toko_id')
                ->whereSantri_id(santri()->id)
                ->latest()
                ->get(),
            'pembelian'     => Tabungan::whereNotNull('toko_id')
                ->whereSantri_id(santri()->id)
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Profile santri
     */
    public function profile(){
        return view('santri.profile',[
            'plus'      => Tabungan::whereSantri_id(santri()->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id(santri()->id)->whereStatus(0)->sum('nominal'),
        ]);
    }

    /**
     * Update password santri
     */
    public function update_password(){
        if(request('password') != request('password_confirmation')){
            session()->flash('warning', 'Password konfirmasi tidak sama');
            return back();
        }
        $attr = request()->validate([
            'password'              => 'required|min:3',
        ]);

        santri()->update($attr);
        session()->flash('success', 'Password berhasil di update');
        return back();
    }
}
