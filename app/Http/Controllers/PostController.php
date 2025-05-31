<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'isi' => 'required|string',
        ]);

        $data = $request->only(['judul', 'isi']);
        $data['user_id'] = Auth::user()->id;

        Post::create($data);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post_edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'isi' => 'required|string',
        ]);

        $data = $request->only(['judul', 'isi']);
        $data['user_id'] = Auth::user()->id;
        
        $post = Post::findOrFail($id);
        $post->update($request->only(['judul', 'isi']));

        return redirect()->route('home')->with('success', 'Unggahan Berhasil Diubah!');
            }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Unggahan Berhasil Dihapus!');
    }
}