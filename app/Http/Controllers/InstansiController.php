<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstansiRequest;
use App\Instansi;
use RealRashid\SweetAlert\Facades\Alert;

class InstansiController extends Controller
{
    public function index()
    {
        $this->authorize('update', Instansi::class);
        $item = Instansi::first();
        return view('pages.instansi.index')->with(['item' => $item]);
    }

    public function edit($id)
    {
        $this->authorize('update', Instansi::class);
        $item = Instansi::findOrFail($id);
        return view('pages.instansi.edit')->with(['item' => $item]);
    }

    public function update(InstansiRequest $request, $id)
    {
        $this->authorize('update', Instansi::class);
        $item = Instansi::findOrFail($id);
        $item->update($request->all());
        Alert::success('Sukses', 'Profile instansi berhasil diupdate');
        return redirect()->route('instansi.index');
    }
}
