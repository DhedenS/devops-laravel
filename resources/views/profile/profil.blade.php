@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="mb-4">Profil Saya</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow border-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mb-3">
                                @if (Auth::user()->logo)
                                    <img src="{{ asset('storage/' . Auth::user()->logo) }}"
                                        class="rounded-circle img-thumbnail" width="150" height="150"
                                        alt="Foto Profil">
                                @else
                                    <img src="https://via.placeholder.com/150" class="rounded-circle img-thumbnail"
                                        alt="Foto Default">
                                @endif
                            </div>

                            <div class="col-md-9">
                                <table class="table table-borderless mb-4">
                                    <tr>
                                        <th style="width: 150px;">Nama Lengkap</th>
                                        <td>: {{ Auth::user()->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>: {{ Auth::user()->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>: {{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>: {{ Auth::user()->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>: {{ Auth::user()->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>: {{ Auth::user()->alamat }}</td>
                                    </tr>
                                </table>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('profile.editProfil') }}" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Edit Profil
                                    </a>
                                    <a href="{{ Auth::user()->role === 'admin' ? route('dashboard') : route('beranda') }}"
                                        class="btn btn-outline-secondary">
                                        <i class="bi bi-house-door"></i> Halaman Utama
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
