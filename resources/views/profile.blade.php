@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <h2>Halaman Profile</h2>
                    </div>
                    <div class="col-md">
                        <div class="float-end">
                            <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <img src="{{ asset('upload/users/' . Auth::user()->foto) }}" alt="" width="100%">
                    </div>
                    <div class="col-md">
                        <table class="table table-striped">
                            <tr>
                                <td width="20%">Nama</td>
                                <td width="2%">:</td>
                                <td>{{ Auth::user()->nama }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Jenis kelamin</td>
                                <td width="2%">:</td>
                                <td>{{ Auth::user()->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Nomor telepon</td>
                                <td width="2%">:</td>
                                <td>{{ Auth::user()->no_telepon }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Alamat</td>
                                <td width="2%">:</td>
                                <td>{{ Auth::user()->alamat }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Foto</td>
                                <td width="2%">:</td>
                                <td>{{ Auth::user()->foto }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Username</td>
                                <td width="2%">:</td>
                                <td>{{ Auth::user()->username }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
