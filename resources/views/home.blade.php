@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body bg-primary text-light">
                <h2>Selamat Datang, {{Auth::user()->nama}}</h2>
                <p>Di praktikum web 2 UNISKA MAB 2025</p>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h5>Buat Postingan Baru</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('post.store')}}" method="post">
                    @csrf
                        <input type="text" name="judul" class="form-control" placeholder="Judul Unggahan">
                        @error('judul')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <textarea name="isi" id="" class="form-control mt-3" rows="4" placeholder="Isi Unggahan"></textarea>
                        @error('isi')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="float-end mt-3">
                            <button type="submit" class="btn btn-primary">Unggah</button>
                        </div>
                </form>
            </div>
        </div>
        @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-header">
                {{$post->user->nama}} - {{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
            </div>
            <div class="card-body">
                <h1>{{$post->judul}}</h1>
                <p>{{$post->isi}}</p>
            </div>
            <div class="card-footer">
                @if(Auth::user()->id == $post->user_id)
                <form action="{{route('post.delete', $post->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
@endsection
