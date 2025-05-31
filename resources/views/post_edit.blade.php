@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2>Edit Unggahan</h2>
                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group mt-3">
                        <label for="">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{$post->judul}}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Isi</label>
                        <textarea name="isi" id="isi" class="form-control" rows="6">{{$post->isi}}</textarea>
                    </div>

                    <div class="float-end">
                        <a href="{{route('home')}}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
