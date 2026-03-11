@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Profil</h5>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @foreach (['nama_lengkap', 'username', 'email', 'no_telp', 'alamat', 'gender', 'logo'] as $field)
                            @error($field)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endforeach

                        <form action="{{ route('profile.updateProfil') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-4 text-center">
                                    @if (Auth::user()->logo)
                                        <img src="{{ asset('storage/' . Auth::user()->logo) }}"
                                            class="rounded-circle img-thumbnail mb-2" width="120" height="120"
                                            alt="Foto Profil">
                                    @else
                                        <img src="https://via.placeholder.com/120" class="rounded-circle img-thumbnail mb-2"
                                            alt="Default Foto">
                                    @endif
                                    <input type="file" name="logo" class="form-control mt-2">
                                    <small class="text-muted">Max: 2MB (jpg, png)</small>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control"
                                            value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ old('username', Auth::user()->username) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No Telepon</label>
                                    <input type="text" name="no_telp" class="form-control"
                                        value="{{ old('no_telp', Auth::user()->no_telp) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="gender" class="form-select">
                                        <option value="Laki-laki"
                                            {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', Auth::user()->alamat) }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('profile.profil') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
