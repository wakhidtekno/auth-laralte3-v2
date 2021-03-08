<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false;

        if (!Auth::attempt(['username' => $validateData['username'], 'password' => $validateData['password']], $remember)) {
            return redirect()->back()->with('pesan', 'Username atau password tidak sesuai');
        }

        return redirect()->route('dashboard');

    }

    public function editPassword()
    {
        return view('auth.edit_password');

    }

    public function updatePassword(EditPasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->password_lama,$user->password)) {
            $user->update([
                'password' => $request->password_baru,
            ]);

            Alert::success('sukses', 'Password berhasil diupdate');
            return redirect()->back();
        }else {
            Alert::warning('Gagal', 'Password lama tidak sesuai');
            return redirect()->back();
        }

    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.profile', ['user' => $user]);
    }

    public function editProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.edit_profile', ['user' => $user]);

    }

    public function updateProfile(EditProfileRequest $request)
    {
        $data = $request->all();
        $user = User::find(Auth::user()->id);

        if ($request->foto)
        {
            $file = substr($user->foto,-63);
            $data['foto'] = $request->file('foto')->store('assets/img', 'public');

            if ($user->foto !== null) {
                File::delete($file);
            }

        }

        $user->update($data);
        Alert::success('sukses', 'Profile berhasil diupdate');
        return redirect()->route('profile');



    }

    public function hapusFoto()
    {
        $user = User::find(Auth::user()->id);
        $file = substr($user->foto,-63);
        $user->update([
            'foto' => null,
        ]);
        File::delete($file);

        Alert::success('sukses', 'foto behasil dihapus');
        return redirect()->route('profile');


    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
