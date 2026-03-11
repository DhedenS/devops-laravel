@extends('layouts.user.user')
@section('content')

<div class="container pt-5 mt-5">

    {{-- Header --}}
    <div class="container section-title" data-aos="fade-up">
        <h2 class="fw-bold">Layanan</h2>
        <p class="lead">Pesan layanan yang anda butuhkan dengan cepat dan mudah</p>
    </div>

    {{-- Navigasi Layanan (ul seperti filter isotope) --}}
    <div style="display: flex; justify-content: center; margin-bottom: 40px;">
    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100" style="display: flex; gap: 10px; list-style: none; padding: 0; margin: 0;">
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'alat_bajak']) }}" class="filter-btn {{ Request::is('layanan/alat_bajak') ? 'active' : '' }}">Alat Bajak</a></li>
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'alat_panen']) }}" class="filter-btn {{ Request::is('layanan/alat_panen') ? 'active' : '' }}">Alat Panen</a></li>
        <li><a href="{{ route('user.layanan.form', ['jenis' => 'tenagatanam']) }}" class="filter-btn {{ Request::is('layanan/tenagatanam') ? 'active' : '' }}">Tenaga Tanam</a></li>
    </ul>
</div>

    {{-- Gambar --}}
    <div class="mb-4 text-center">
        <img src="{{ asset('assets/images/logos/alat_bajak.jpg') }}" alt="Alat Bajak" class="img-fluid rounded shadow-sm">
    </div>

    {{-- Konten Layanan --}}
    <!-- Deskripsi -->
    <div class="text-center mb-4">
        <h5 class="fw-semibold" style="font-size: 1.2rem;">Layanan alat bajak</h5>
        <p class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem;">
            Sewa alat bajak modern untuk mengolah lahan dengan efisien. Cocok untuk semua jenis sawah dan ladang.
        </p>
    </div>

    <!-- Fasilitas -->
    <div class="mb-4">
        <h5 class="text-success fw-semibold text-center mb-3" style="font-size: 1.1rem;">Fasilitas</h5>
        <ol class="text-muted" style="max-width: 700px; margin: 0 auto; font-size: 0.95rem; line-height: 1.7;">
            <li>Tersedia bajak traktor</li>
            <li>Rekomendasi untuk lahan luas dan sempit.</li>
            <li>Disertai operator berpengalaman.</li>
        </ol>
    </div>

    {{-- Tombol Aksi --}}
    <div class="text-center mt-4 mb-5">
        <a class="btn btn-lg px-4 text-white shadow-sm" style="background-color: #f5b93a; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#formPengajuanModal">
            Ajukan Sewa
        </a>
    </div>

</div>

<!-- Modal Form Pengajuan -->
<div class="modal fade" id="formPengajuanModal" tabindex="-1" aria-labelledby="formPengajuanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="backdrop-filter: blur(10px);">
            <div class="modal-header">
                <h5 class="modal-title" id="formPengajuanLabel">Form Pengajuan Sewa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengajuansewa.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                      <label class="form-label">Nama Petani</label>
                      <input type="text" class="form-control" value="{{ Auth::user()->nama_lengkap }}" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="id_sewa" class="form-label">Pilih Jenis Sewa:</label>
                      <select name="id_sewa" id="id_sewa" class="form-select" required>
                          <option value="" selected disabled>-- Pilih Jenis Sewa --</option>
                          @foreach($sewaList as $sewa)
                              <option value="{{ $sewa->id_sewa }}" data-harga="{{ $sewa->harga_sewa }}">
                                {{ $sewa->nama_sewa }}
                              </option>
                          @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_sewa" class="form-label">Tanggal Sewa:</label>
                        <input type="date" name="tanggal_sewa" class="form-control" required value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="mb-3">
                        <label for="lama_sewa_hari" class="form-label">Lama Sewa (hari):</label>
                        <input type="number" name="lama_sewa_hari" id="lama_sewa_hari" class="form-control" min="1" required>
                    </div>

                    <!-- Tambahan: Total Biaya -->
                    <div class="mb-3">
                      <label class="form-label">Total Biaya Sewa:</label>
                      <input type="text" id="total_biaya" class="form-control" readonly value="Rp 0">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan (Opsional):</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk update total biaya otomatis -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const idSewaSelect = document.getElementById('id_sewa');
    const lamaSewaInput = document.getElementById('lama_sewa_hari');
    const totalBiayaInput = document.getElementById('total_biaya');

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(angka);
    }

    function updateTotalBiaya() {
        const selectedOption = idSewaSelect.options[idSewaSelect.selectedIndex];
        const hargaSewa = selectedOption ? parseInt(selectedOption.getAttribute('data-harga')) : 0;
        const lamaSewa = parseInt(lamaSewaInput.value) || 0;

        if (hargaSewa && lamaSewa > 0) {
            totalBiayaInput.value = formatRupiah(hargaSewa * lamaSewa);
        } else {
            totalBiayaInput.value = 'Rp 0';
        }
    }

    idSewaSelect.addEventListener('change', updateTotalBiaya);
    lamaSewaInput.addEventListener('input', updateTotalBiaya);
});
</script>

@endsection
