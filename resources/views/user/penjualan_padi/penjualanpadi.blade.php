@extends('layouts.user.user')
@section('content')
    <section id="penjualan" class="py-5 bg-white">
        <div class="container">
            <div class="container section-title" data-aos="fade-up" style="margin-top: 50px;">
                <h2 class="fw-bold">Penjualan Padi</h2>
                <p class="lead">Catat penjualan padi ke pembeli dengan sistem yang rapi.</p>
            </div>

            <!-- Gambar -->
            <div class="text-center mb-3 mt-2">
                <img src="{{ asset('assets/images/logos/jualpadi.jpg') }}" alt="Penjualan Padi" class="img-fluid rounded"
                    style="max-height: 350px; object-fit: cover;">
            </div>

            <!-- Deskripsi -->
            <div class="text-center mb-4">
                <h5 class="fw-semibold" style="font-size: 1.2rem;">Penjualan Padi</h5>
                <p class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem;">
                    Catat penjualan padi ke pembeli dengan sistem yang rapi. Dapatkan bukti transaksi langsung dan pantau
                    hasil jualmu kapan saja.
                </p>
            </div>

            <!-- Fasilitas -->
            <div class="mb-4">
                <h5 class="text-success fw-semibold text-center mb-3" style="font-size: 1.1rem;">Fasilitas</h5>
                <ol class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem; line-height: 1.7;">
                    <li>Form Pengajuan Penjualan Praktis.</li>
                    <li>Layanan Mobil Angkut.</li>
                    <li>Transaksi Transparan.</li>
                    <li>Bukti Transaksi Digital.</li>
                    <li>Riwayat Penjualan Lengkap.</li>
                    <li>Potongan Biaya Tercatat Otomatis.</li>
                </ol>
            </div>
            <!-- Tombol -->
            <div class="text-center mt-4">
                @auth
                    <a class="btn btn-lg px-4 text-white shadow-sm" style="background-color: #f5b93a; border-radius: 10px;"
                        data-bs-toggle="modal" data-bs-target="#formPengajuanModal">
                        Ajukan Penjualan
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg px-4 text-white shadow-sm"
                        style="background-color: #f5b93a; border-radius: 10px;">
                        Login untuk Ajukan Penjualan
                    </a>
                @endauth
            </div>
        </div>
    </section>

    @auth
        <div class="modal fade" id="formPengajuanModal" tabindex="-1" aria-labelledby="formPengajuanLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" style="backdrop-filter: blur(10px);">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formPengajuanLabel">Form Pengajuan Penjualan Padi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengajuanpadi.store') }}" method="POST">
                            @csrf

                            <!-- Nama Petani -->
                            <div class="mb-3">
                                <label class="form-label">Nama Petani</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->nama_lengkap }}" readonly>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>
                            <!-- Pilih Padi -->
                            <div class="mb-3">
                                <label for="id_padi" class="form-label">Pilih Padi:</label>
                                <select name="id_padi" class="form-select" required>
                                    <option value="">-- Pilih Padi --</option>
                                    @foreach ($padiList as $padi)
                                        <option value="{{ $padi->id_padi }}"
                                            {{ old('id_padi') == $padi->id_padi ? 'selected' : '' }}>
                                            {{ $padi->nama_padi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_padi')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Perlu Mobil -->
                            <div class="mb-3">
                                <label class="form-label">Perlu Mobil?</label>
                                <select name="perlu_mobil" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="1" {{ old('perlu_mobil') == '1' ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ old('perlu_mobil') == '0' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <!-- Jumlah Karung -->
                            <div class="mb-3">
                                <label class="form-label">Jumlah Karung</label>
                                <input type="number" name="jumlah_karung" class="form-control"
                                    value="{{ old('jumlah_karung') }}" min="1" step="1" required>
                            </div>

                            <!-- Tanggal Pengajuan -->
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan" class="form-control"
                                    value="{{ old('tanggal_pengajuan') }}" required>
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-3">
                                <label class="form-label">Keterangan (Opsional)</label>
                                <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                            </div>
                            

                            <!-- Tombol Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Ajukan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
