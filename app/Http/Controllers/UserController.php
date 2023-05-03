<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use App\User;
class UserController extends Controller
{
    public function index(Request $request, User $user)
    {
        if ($request->ajax()) {
            return DataTables::of(User::where('level','!=','superadmin')->get())
            ->addIndexColumn()
            ->addColumn('action',function(User $user){
                return view('pages.users.action')->with(['user' => $user]);
            })
            ->toJson();
        }
        return view('pages.users.index');
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

        if ($request->foto) {
            $data['foto'] = $request->file('foto')->store('assets/img', 'public');
        }
        User::create($data);

        Alert::success('sukses', "{$data['level']} dengan nama {$data['nama']} sukses ditambahkan");
        return redirect()->back();

    }

    public function show($id)
    {
        $item = User::findOrFail($id);
        return view('pages.users.show')->with(['item' => $item]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('pages.users.edit')->with(['item' => $item]);

    }

    public function update(UserRequest $request, $id)
    {
        // dump($request->all());
        $data = $request->all();
        $item = User::findOrFail($id);

        if ($request->foto)
        {
            $file = substr($item->foto,-63);
            $data['foto'] = $request->file('foto')->store('assets/img', 'public');

            if ($item->foto !== null) {
                File::delete($file);
            }

        }

        $item->update($data);

        Alert::success('sukses', 'User berhasil diupdate');
        return redirect()->back();
    }

    public function hapusFoto($id)
    {
        $item = User::findOrFail($id);
        $file = substr($item->foto,-63);
        $item->update([
            'foto' => null,
        ]);
        File::delete($file);

        Alert::success('sukses', 'foto behasil dihapus');
        return redirect()->back();


    }

    public function resetPassword($id)
    {
        $item = User::findOrFail($id);
        return view('pages.users.reset_password')->with(['item' => $item]);
    }

    public function UpdatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|same:konfirmasi_password',
            'konfirmasi_password' => 'required|min:6|same:password',
        ]);
        $item = User::findOrFail($id);
        $item->update([
            'password' => $request->password,
        ]);

        Alert::success('Sukses', "Kata sandi {$item->username} sukses direset");
        return redirect()->back();

    }

    public function destroy($id)
    {

        $item = User::findOrFail($id);

        if ($item->foto != null) {
            $file = substr($item->foto,-63);
            File::delete($file);

        }

        $item->delete();

        Alert::success('Sukses', "{$item->level} dengan nama {$item->nama} berhasil dihapus");
        return redirect()->back();


    }
}
