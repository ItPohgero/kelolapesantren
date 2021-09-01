<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Tabungan;
use App\Models\TimeLine;
use App\Models\Toko;
use App\Models\UserTabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PDF;

class BarcodeController extends Controller
{
    public function read($code, $hash)
    {
        if (_HASH != $hash) {
            return abort(404);
        }
        $santri = Santri::whereCode($code)->firstOrFail();
        return view('barcode.read', [
            'santri'        => $santri,
            'plus'          => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'         => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ]);
    }

    /**
     * Action cek toko payment
     */
    public function cek_payment($code)
    {
        $toko = Toko::wherePin(request('pin'))->first();
        if (!$toko) {
            session()->flash('warning', 'PIN Toko anda salah');
            return back();
        } else {
            session()->put('toko', $toko->pin);
            return Redirect::route('barcode.payment', ['pin' => $toko->pin, 'code' => $code]);
        }
    }

    /**
     * Form payment
     */
    public function payment($pin, $code)
    {
        $santri = Santri::whereCode($code)->firstOrFail();
        return view('barcode.payment', [
            'santri'        => $santri,
            'toko'          => Toko::wherePin($pin)->firstOrFail(),
            'plus'          => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'         => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ]);
    }

    /**
     * Action Transaksi payment
     */
    public function action($pin, $code)
    {
        $santri = Santri::whereCode($code)->firstOrFail();
        $toko   = Toko::wherePin($pin)->firstOrFail();
        if (Hash::check(request('password'), $santri->password)) {

            $invoice = 0 . '-T' . $toko->id . '-' . Str::random(8);
            Tabungan::create([
                'invoice'       => $invoice,
                'santri_id'     => $santri->id,
                'desc'          => request('desc'),
                'status'        => 0,
                'nominal'       => request('nominal'),
                'toko_id'       => $toko->id,
                'user_id'       => $santri->user_id
            ]);
            return Redirect::route('barcode.invoice', $invoice);
        } else {
            session()->flash('warning', 'PIN atau Password anda salah');
            return back()->withInput();
        }
    }
    /**
     * Invoice toko dan tabungan
     */
    public function invoice($invoice)
    {
        return view('barcode.invoice', [
            'tabungan'      => Tabungan::whereInvoice($invoice)->firstOrFail()
        ]);
    }

    /**
     * Action save and take tabungan
     */
    public function cek_tabungan($code)
    {
        $chek = UserTabungan::whereCode(request('code'))->first();
        if ($chek) {
            if (Hash::check(request('password'), $chek->password)) {
                session()->put('tabungan', $chek->code);
                session()->put('user_tabungan', $chek);
                return Redirect::route('barcode.take.save', $code);
            } else {
                session()->flash('warning', 'Password anda salah');
                return back();
            }
        } else {
            session()->flash('warning', 'Code salah atau tidak terdaftar');
            return back();
        }
    }

    /**
     * Take and save tabungan
     */
    public function take_save($code){
        $santri = Santri::whereCode($code)->firstOrFail();
        return view('barcode.take-save',[
            'santri'        => $santri,
            'plus'          => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'         => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ]);
    }

    /**
     * Store take save tabungan
     */

     public function store(){
        if (Hash::check(request('password'), session()->get('user_tabungan')->password)) {
            
            request()->validate([
                'desc'          => 'required',
                'nominal'       => 'required',
            ]);
    
            $user_id    = session()->get('user_tabungan')->id;
            $status     = (request('query') == 'setor') ? 1 : 0;
            $santri     = Santri::whereCode(request('code'))->firstOrFail();
            $invoice    = $status . '-' .  date('mdy') . 'I' . $santri->id . 'T' . $user_id . 'P' . Str::random(5);
            
            Tabungan::create([
                'invoice'       => $invoice,
                'santri_id'     => $santri->id,
                'desc'          => request('desc'),
                'status'        => $status,
                'nominal'       => request('nominal'),
                'toko_id'       => null,
                'user_id'       => $user_id
            ]);
    
            session()->flash('success', 'Tabungan dari ' . $santri->nama . ' berhasil ' . status($status) . ' sebesar ' . number_format(request('nominal')) . ' pada ' . date('d F Y , h:i'));
            TimeLine::create([
                'message'       => 'Tabungan dari ' . $santri->nama . ' berhasil ' . status($status) . ' sebesar ' . number_format(request('nominal')) . ' pada ' . date('d F Y , h:i'),
                'user_id'       => $user_id
            ]);
            return Redirect::route('barcode.invoice', $invoice);

        } else {
            session()->flash('warning', 'Password anda salah');
            return back()->withInput();
        }        
     }

      /**
     * Print toko pdf
     */
    public function toko_pdf($invoice)
    {
        $tabungan   = Tabungan::whereInvoice($invoice)->firstOrFail();
        $santri     = Santri::whereId($tabungan->santri_id)->firstOrFail();

        $pdf = PDF::loadView('barcode.download-pdf-toko', [
            'tabungan'  => $tabungan,
            'santri'    => $santri,
            'plus'      => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ])->setPaper('b5', 'landscape');

        return $pdf->stream($invoice . '.pdf', array("Attachment" => false));
    }

      /**
     * Print PDF Tabungan
     */
    public function tabungan_pdf($invoice)
    {

        $tabungan   = Tabungan::whereInvoice($invoice)->firstOrFail();
        $santri     = Santri::whereId($tabungan->santri_id)->firstOrFail();

        $pdf = PDF::loadView('barcode.download-pdf', [
            'tabungan'  => $tabungan,
            'santri'    => $santri,
            'plus'      => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ])->setPaper('b5', 'landscape');

        return $pdf->stream($invoice . '.pdf', array("Attachment" => false));
    }
}
