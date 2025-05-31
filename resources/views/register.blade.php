@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <div class="text-center">
            <h3>Register page</h3><br>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        </div>
        <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">--Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="">Nomor telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" placeholder="no_telepon"
                            class="form-control"></input>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="">Alamat (optional)</label>
                <textarea type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="">Foto (optional)</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
            </div>
            <a href="/">sudah punya akun? Login sekarang</a> <br>
            <button type="submit" class="mt-4 btn btn-primary">
                Register Akun
            </button>
        </form>
    </div>
@endsection
