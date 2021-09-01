<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\Tabungan;
use App\Models\UserTabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PDF;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        return view('main.tabungan.user', [
            'user'      => UserTabungan::whereUser_id(userId())->get()
        ]);
    }

    /**
     * Action add user
     */
    public function add()
    {
        $code   = 'T' . '-' . userId() . '-' . request('code');
        $cek    = UserTabungan::whereCode($code)->first();
        if ($cek) {
            session()->flash('warning', 'Code sudah terdaftar');
            return back()->withInput();
        }
        $attr   = request()->validate([
            'an'        => 'required',
            'phone'     => 'required',
            'code'      => 'required',
        ]);
        
        
        $attr['user_id']    = userId();
        $attr['code']       = $code;
        $attr['password']   = bcrypt(request('password'));
        UserTabungan::create($attr);

        session()->flash('success', 'Admin tabungan a.n ' .  request('an') . ' telah ditambahkan');
        TimeLine('Admin tabungan a.n ' .  request('an') . ' telah ditambahkan');
        return back();
    }

    /**
     * Update user tabungan
     */
    public function up($id)
    {
        $attr = request()->validate([
            'an'        => 'required',
            'phone'     => 'required',
        ]);
        $attr['password']   = bcrypt(request('password'));
        
        $user = UserTabungan::whereId($id)->firstOrFail();
        $user->update($attr);

        session()->flash('success', 'Admin tabungan a.n ' .  request('an') . ' berhasil diedit');
        TimeLine('Admin tabungan a.n ' .  request('an') . ' berhasil diedit');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $santri = Santri::whereCode(request('code'))->first();
        # Chek apakah santri dari admin
        if ($santri->user_id != userId()) {
            return Redirect::route('dashboard');
        }

        return view('main.tabungan.take-save', [
            'santri'       => $santri,
            'plus'      => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Hash::check(request('password'), auth()->user()->password)) {
            session()->flash('warning', 'Password anda salah');
            return back();
        }
        $santri = Santri::whereCode(request('code'))->first();
        # Chek apakah santri dari admin
        if ($santri->user_id != userId()) {
            return Redirect::route('dashboard');
        }

        request()->validate([
            'desc'          => 'required',
            'status'        => 'required',
            'nominal'       => 'required',
        ]);

        $invoice = request('status') . '-' .  date('mdy') . 'I' . $santri->id . 'T' . userId() . 'P' . Str::random(5);
        Tabungan::create([
            'invoice'       => $invoice,
            'santri_id'     => $santri->id,
            'desc'          => request('desc'),
            'status'        => request('status'),
            'nominal'       => request('nominal'),
            'toko_id'       => null,
            'user_id'       => userId()
        ]);

        session()->flash('success', 'Tabungan dari ' . $santri->nama . ' berhasil ' . status(request('status')) . ' sebesar ' . number_format(request('nominal')) . ' pada ' . date('d F Y , h:i'));
        TimeLine('Tabungan dari ' . $santri->nama . ' berhasil ' . status(request('status')) . ' sebesar ' . number_format(request('nominal')) . ' pada ' . date('d F Y , h:i'));

        return Redirect::route('tabungan.invoice', $invoice);
    }


    /**
     * Show success transaksi tabungan
     */

    public function invoice($invoice)
    {
        $tabungan   = Tabungan::whereInvoice($invoice)->firstOrFail();
        $santri     = Santri::whereId($tabungan->santri_id)->firstOrFail();

        return view('main.tabungan.invoice', [
            'tabungan'  => $tabungan,
            'santri'    => $santri,
            'plus'      => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),

        ]);
    }

    /**
     * Show success transaksi tabungan
     */

    public function download($invoice)
    {
        $tabungan   = Tabungan::whereInvoice($invoice)->firstOrFail();
        $santri     = Santri::whereId($tabungan->santri_id)->firstOrFail();

        $pdf = PDF::loadView('main.tabungan.download', [
            'tabungan'  => $tabungan,
            'santri'    => $santri,
            'plus'      => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ])->setPaper('b5', 'landscape');

        return $pdf->stream($invoice . '.pdf', array("Attachment" => false));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # Data ID == code (santri)
        $santri = Santri::whereCode($id)->firstOrFail();
        # Chek apakah santri dari admin
        if ($santri->user_id != userId()) {
            return Redirect::route('dashboard');
        }

        $tabungan = Tabungan::whereSantri_id($santri->id)->latest()->paginate(5);

        return view('main.tabungan.show', [
            'tabungan'  => $tabungan,
            'santri'    => $santri,
            'plus'      => Tabungan::whereSantri_id($santri->id)->whereStatus(1)->sum('nominal'),
            'minus'     => Tabungan::wheresantri_id($santri->id)->whereStatus(0)->sum('nominal'),
        ]);
    }
}
