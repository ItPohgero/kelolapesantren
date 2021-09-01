<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pondok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PondokController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $pondok = Pondok::whereUserId($id)->first();
        if ($pondok) {
            return view('main.pondok.show', [
                'pondok'        => $pondok
            ]);
        } else {
            return view('main.pondok.create');
        }
    }
    public function store()
    {
        request()->validate([
            'nama'          => 'required|max:25',
            'pengasuh'      => 'required',
            'alamat'        => 'required'
        ]);

        $attr               = request()->all();
        $attr['user_id']    = userId();
        Pondok::create($attr);

        TimeLine('Perubahan profile pondok dilakukan pada ' . date(' d F Y'));
        return Redirect::route('dashboard');
    }

    public function update($id)
    {
        $pondok = Pondok::whereId($id)->firstOrFail();

        request()->validate([
            'nama'          => 'required',
            'pengasuh'      => 'required',
            'alamat'        => 'required'
        ]);

        $pondok->update(request()->all());

        session()->flash('success', 'Data berhasil diupdate');
        TimeLine('Perubahan profile pondok dilakukan pada ' . date(' d F Y'));
        return back();
    }
}
