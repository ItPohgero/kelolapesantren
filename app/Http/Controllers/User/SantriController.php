<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.santri.index', [
            'santri'        => Santri::whereUser_id(userId())
                ->latest()
                ->paginate(5)
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
        request()->validate([
            'nama'      => 'required',
            'code'      => 'required|min:3|max:10|unique:santris,code|alpha_num',
            'alamat'    => 'required'
        ]);

        $code = userId() . '-' . request('code');
        $santri = Santri::whereCode($code)->whereUser_id(userId())->first();
        if ($santri) {
            session()->flash('warning', 'Code / ID ' . $santri->code . ' sudah ada, atas nama ' . $santri->nama);
            return Redirect::back();
        }

        Santri::create([
            'nama'      => request('nama'),
            'code'      => $code,
            'password'  => bcrypt('password'),
            'alamat'    => request('alamat'),
            'user_id'   => userId()
        ]);

        TimeLine('Data santri baru berhasil ditambahkan a.n ' . request('nama'));
        session()->flash('success', 'Data santri baru berhasil ditambahkan a.n ' . request('nama'));
        return Redirect::route('santri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $santri = Santri::where('code', $code)->firstOrFail();
        # Chek apakah santri dari admin
        if ($santri->user_id != userId()) {
            return Redirect::route('dashboard');
        }

        return view('main.santri.show', [
            'santri'        => $santri
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $santri = Santri::whereCode($code)->first();
        # Chek apakah santri dari admin
        if ($santri->user_id != userId()) {
            return Redirect::route('dashboard');
        }

        $attr = request()->validate([
            'nama'      => 'required',
            'alamat'    => 'required'
        ]);

        $santri->update($attr);

        TimeLine('Data santri berhasil diedit a.n ' . request('nama'));
        session()->flash('success', 'Data santri berhasil diedit a.n ' . request('nama'));
        return Redirect::back();
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
