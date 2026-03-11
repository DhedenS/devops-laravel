@extends('layouts.admin.admin')
@section('content')

<div class="container py-4">
    <h2 class="mb-4" style="color: #2F8F2F; font-weight: 700;">Daftar Pengajuan Sewa</h2>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #DFF0D8; color: #3A6A15; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-striped align-middle" style="border-color: #7B5E3C;">
            <thead style="background-color: #7B5E3C; color: white;">
                <tr>
                    <th>ID</th>
                    <th>Nama Petani</th>
                    <th>Jenis Sewa</th>
                    <th>Tanggal Sewa</th>
                    <th>Lama Sewa (hari)</th>
                    <th>Total Harga Sewa</th>
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
                        <td>{{ $pengajuan->jenisSewa->nama_sewa }}</td>
                        <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_sewa)->format('d-m-Y') }}</td>
                        <td>{{ $pengajuan->lama_sewa_hari }}</td>
                        <td style="font-weight: 600; color: #2F8F2F;">
                            Rp {{ number_format($pengajuan->jenisSewa->harga_sewa * $pengajuan->lama_sewa_hari, 0, ',', '.') }}
                        </td>
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
                            @if ($pengajuan->status === 'menunggu persetujuan')
                                <form action="{{ route('pengajuansewa.updateStatus', $pengajuan->id_pengajuan) }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select name="status" class="form-select form-select-sm" required style="border-color: #2F8F2F;">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="disetujui">Disetujui</option>
                                            <option value="ditolak">Ditolak</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-success" style="background-color: #2F8F2F; border:none;">Ubah</button>
                                    </div>
                                </form>
                            @else
                                <em style="color: #6c757d;">-</em>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada pengajuan sewa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
