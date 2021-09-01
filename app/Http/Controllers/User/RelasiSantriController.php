<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Relasi;
use App\Models\RelasiSantri;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RelasiSantriController extends Controller
{

    /**
     * Data Relasi (Create dengan modal)
     */
    public function index()
    {
        return view('main.relasi.index', [
            'relasi'        => Relasi::whereUser_id(userId())->get()
        ]);
    }

    /**
    * Daftar anggota relasi
    */

    public function anggota($slug)
    {
        $relasi = Relasi::whereSlug($slug)->firstOrFail();
        return view('main.relasi.anggota', [
            'anggota'       => $relasi->santris,
            'relasi'        => $relasi
        ]);
    }

    public function store()
    {
        $relasi = Relasi::whereUser_id(userId())->whereNama(request('nama'))->first();
        if ($relasi) {
            session()->flash('warning', 'Data relasi sudah tersedia');
            return back();
        }
        Relasi::create([
            'nama'      => request('nama'),
            'slug'      => Str::slug(userId() . ' ' . date('dmy') . ' ' . Str::random(5)),
            'user_id'   => userId()
        ]);
        TimeLine('Relasi berhasil ditambahkan, dengan nama ' . request('nama'));
        session()->flash('success', 'Relasi berhasil ditambahkan');
        return back();
    }

    /**
     * Action update
     */
    public function update($slug)
    {
        $relasi = Relasi::whereSlug($slug)->firstOrFail();

        $relasi->update([
            'nama'      => request('nama')
        ]);

        TimeLine('Relasi berhasil diedit, dari ' . request('old') . ' menjadi ' . request('nama'));
        session()->flash('success', 'Relasi berhasil diedit, dari ' . request('old') . ' menjadi ' . request('nama'));
        return back();
    }

    /**
     *  Menambahkan relasi baru dengan santri
     */
    public function joined($id)
    {
        $santri = Santri::find($id);
        $relasi = Relasi::orderBy('nama', 'ASC')->whereUser_id(userId())->get();
        return view('main.relasi.joined', compact('id', 'santri', 'relasi'));
    }

    /**
     * Action Joined
     */
    public function upload()
    {
        $santri = Santri::find(request('santri_id'));
        # chek apakah data sudah ada
        if (RelasiSantri::where(['santri_id' => request('santri_id'), 'relasi_id' => request('relasi_id')])->first()) {
            session()->flash('warning', 'Data relasi sudah tersedia bagi santri');
            return back();
        }

        # Memasukkan many to many
        $santri->relasis()->attach(request('relasi_id'));

        session()->flash('success', 'Data relasi berhasil ditambahkan');
        return back();
    }

    /**
     * Action remove relasi
     */
    public function remove($santri_id, $relasi_id)
    {
        $santri = Santri::find($santri_id);
        # remove many to many
        $santri->relasis()->detach($relasi_id);
        session()->flash('success', 'Data relasi berhasil diremove');
        return back();
    }
}
