<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['foto'] = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/users'), $filename);
            $input['foto'] = $filename;
        }

        $input['remember_token'] = null;

        User::create($input);

        return redirect()->route('login')->with('Success', 'Registrasi Berhasil, Silahkan Login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home')->with('success', "Login Berhasil");
        }

        return redirect()->back()->with('error', 'Username atau Password Salah');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login')->with('succes', 'Logout berhasil');
    }
}