<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends BaseController
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }
    public function profile()
    {
        return view('profile');
    }

    public function profileEdit($id)
    {
        $user = User::findOrFail($id);

        return view('profile_edit', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $input = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/users'), $filename);
            $input['foto'] = $filename;
        }

        $user->update($input);

        return redirect()->route('profile')->with('success');
    }
}