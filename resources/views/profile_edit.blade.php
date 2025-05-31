@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2>Edit profile</h2>
                <form action="{{ route('profile.update', $user->id) }}" method="post" enctype=multipart/form-data>
                    @csrf
                    @method('put')
                    <div class="form-group mt-3">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->nama }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Nomor Telepon</label>
                        <input name="no_telepon" id="no_telepon" class="form-control" value="{{ $user->no_telepon }}"></input>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control">{{ $user->alamat }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <img src="{{ asset('upload/users/' . $user->foto) }}" alt="" width="100%">
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mt-3">
                                <label for="">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                                <small class="text-danger">Isi apabila ingin merubah file</small>
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('profile') }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
