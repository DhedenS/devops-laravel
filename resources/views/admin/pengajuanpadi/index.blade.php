@extends('layouts.admin.admin')
@section('content')

<div class="container py-4">
    <h2 class="mb-4">Daftar Pengajuan Padi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Petani</th>
                    <th>Nama Padi</th>
                    <th>Jumlah Karung</th>
                    <th>Jumlah (kg)</th>
                    <th>Total Harga</th>
                    <th>Perlu Mobil</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuanList as $pengajuan)
                    <tr>
                        <td>{{ $pengajuan->id_pengajuan }}</td>
                        <td>{{ $pengajuan->petani->nama_lengkap }}</td>
                        <td>{{ $pengajuan->padi->nama_padi }}</td>
                        <td>{{ $pengajuan->jumlah_karung }}</td>
                        <td>{{ $pengajuan->jumlah_kg ?? '-' }}</td>
                        <td>{{ $pengajuan->total_harga ? 'Rp ' . number_format($pengajuan->total_harga, 0, ',', '.') : '-' }}</td>
                        <td>{{ $pengajuan->perlu_mobil ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                        <td>
                            <span class="badge bg-{{ 
                                $pengajuan->status == 'menunggu persetujuan' ? 'secondary' : 
                                ($pengajuan->status == 'disetujui' ? 'success' : 'danger') 
                            }}">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                        </td>
                        <td>{{ $pengajuan->keterangan ?? '-' }}</td>
                        <td>
                            @if($pengajuan->status == 'disetujui')
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $pengajuan->id_pengajuan }}">
                                    Edit
                                </button>
                                <form action="{{ route('pengajuanpadi.destroy', $pengajuan->id_pengajuan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            @else
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $pengajuan->id_pengajuan }}">
                                    Ubah
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">Belum ada pengajuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="/cetak" target="_blank" class="btn btn-success mb-2">Cetak HTML</a>
<a href="/cetak" class="btn btn-danger mb-2">Cetak PDF</a>

    </div>
</div>

{{-- Modal diletakkan di luar tabel --}}
@foreach($pengajuanList as $pengajuan)
<div class="modal fade" id="modalEdit{{ $pengajuan->id_pengajuan }}" tabindex="-1" aria-labelledby="modalLabel{{ $pengajuan->id_pengajuan }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('pengajuanpadi.update', $pengajuan->id_pengajuan) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabel{{ $pengajuan->id_pengajuan }}">Ubah Pengajuan Padi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="jumlah_kg" class="form-label">Jumlah (kg)</label>
                    <input type="number" step="0.1" name="jumlah_kg" class="form-control" value="{{ old('jumlah_kg', $pengajuan->jumlah_kg) }}" required>
                </div>
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="number" name="total_harga" class="form-control" value="{{ old('total_harga', $pengajuan->total_harga) }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="disetujui" {{ $pengajuan->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="menunggu persetujuan" {{ $pengajuan->status == 'menunggu persetujuan' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan (opsional)</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $pengajuan->keterangan) }}</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
