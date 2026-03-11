@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <h4 class="mb-3">Pilih Petani untuk Cetak PDF (Bisa lebih dari satu)</h4>

    <form action="{{ route('pengajuan_padi.cetak_user_terpilih') }}" method="POST" target="_blank">
        @csrf
        <div class="mb-3">
            <label for="id_petani" class="form-label">Nama Petani</label>
            <select name="id_petani[]" id="id_petani" class="form-select" multiple required>
                @foreach($petaniList as $petani)
                    <option value="{{ $petani->id_petani }}">{{ $petani->nama }}</option>
                @endforeach
            </select>
            <small class="text-muted">Tekan Ctrl (Windows) atau Command (Mac) untuk pilih lebih dari satu.</small>
        </div>

        <button type="submit" class="btn btn-primary">Cetak PDF</button>
    </form>
</div>
@endsection
