<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PDF;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.toko.index', [
            'toko'     => Toko::whereUser_id(userId())->latest()->paginate(5)
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
        $attr = request()->validate([
            'nama'      => 'required',
            'pemilik'   => 'required',
            'phone'     => 'required|alpha_num'
        ]);

        $attr['hash']       = date('dmy') . Str::random(8);
        $attr['pin']        = Str::random(5);
        $attr['user_id']    = userId();
        Toko::create($attr);

        session()->flash('success', 'Toko ' . request('nama') . ' atas nama pemilik ' . request('pemilik') . ' berhasil ditambahkan');
        TimeLine('Toko ' . request('nama') . ' atas nama pemilik ' . request('pemilik') . ' berhasil ditambahkan');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hash)
    {
        $toko       = Toko::wherehash($hash)->firstOrFail();
        $tabungan   = Tabungan::whereToko_id($toko->id)
            ->whereUser_id(userId())
            ->latest()
            ->paginate(5);
        return view('main.toko.report', [
            'data'      => $tabungan,
            'toko'      => $toko
        ]);
    }

    /**
     * Report toko option
     */
    public function option($opt, $hash)
    {
        $toko = Toko::whereHash($hash)->firstOrFail();
        if ($opt == 'hari-ini') {
            $tabungan    = Tabungan::whereToko_id($toko->id)
                ->whereStatus(0)
                ->whereDay('created_at', date('d'))
                ->get();
        } elseif ($opt == 'bulan-ini') {
            $tabungan    = Tabungan::whereToko_id($toko->id)
                ->whereStatus(0)
                ->whereMonth('created_at', date('m'))
                ->get();
        } elseif ($opt == 'tahun-ini') {
            $tabungan    = Tabungan::whereToko_id($toko->id)
                ->whereStatus(0)
                ->whereYear('created_at', date('Y'))
                ->get();
        }

        if ($opt == 'hari-ini') {
            $title  = 'Hari ' . date('d M Y');
        } elseif ($opt == 'bulan-ini') {
            $title  = 'Bulan ' .  date('F');
        } elseif ($opt == 'tahun-ini') {
            $title = 'Tahun ' .  date('Y');
        }

        $pdf = PDF::loadView('main.toko.pdf-report', [
            'toko'      => $toko,
            'transaksi' => $tabungan,
            'title'     => $title
        ])->setPaper('a4', 'landscape');

        return $pdf->stream($opt . ' ' . $toko->hash . '.pdf', array("Attachment" => false));
    }

    /**
     * Pilihan tanggal filter
     */
    public function choose($hash)
    {
        $ex = explode('-', request('query'));
        $toko = Toko::whereHash($hash)->firstOrFail();
        $tabungan    = Tabungan::whereToko_id($toko->id)
            ->whereStatus(0)
            ->whereMonth('created_at', $ex['1'])
            ->whereYear('created_at', $ex['0'])
            ->get();

        $pdf = PDF::loadView('main.toko.pdf-report', [
            'toko'      => $toko,
            'transaksi' => $tabungan,
            'title'     => request('query')
        ])->setPaper('a4', 'landscape');

        return $pdf->stream(request('query') . ' ' . $toko->hash . '.pdf', array("Attachment" => false));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
