@extends('layouts.user.user')
@section("content")

<section id="hero" class="hero section dark-background">

  <img src="{{ asset('assets/images/logos/background.jpeg') }}" alt="Hero Background" data-aos="fade-in">

  <div class="container">

    <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-xl-6 col-lg-8">
        <h3>MENGHUBUNGKAN PETANI KE PASAR, DENGAN MUDAH.</h3>
        <h>“Karena Setiap Panen Layak Mendapatkan Nila Terbaik.”</h>
      </div>
    </div>

    <div class="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <h3><a href="">Penjualan Produk Pertanian</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="400">
        <div class="icon-box">
          <h3><a href="">Penyewaan Alat Tani</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="500">
        <div class="icon-box">
          <h3><a href="">Informasi Harga Padi</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="600">
        <div class="icon-box">
          <h3><a href="">Panduan & Tata Cara Bertani</a></h3>
        </div>
      </div>
      <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="700">
        <div class="icon-box">
          <h3><a href="">Berita & Acara Pertanian</a></h3>
        </div>
      </div>
    </div>

  </div>

</section>

<section id="about" class="about section py-5">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 align-items-center">

    <!-- Judul -->
      <div class="row">
        <div class="col-12">
          <h2 class="text-center text-2xl font-semibold text-success mb-4">Tentang Kami</h2>
        </div>
      </div>
  
      <div class="row gy-4 align-items-center">

      <!-- Gambar -->
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{ asset('assets/images/logos/about.jpeg') }}" alt="Sawah" class="img-fluid rounded shadow-md">
      </div>
      
      <!-- Teks -->
      <div class="col-lg-6 order-2 order-lg-1 text-gray-800">
        <p class="mb-3">
          Kami adalah platform digital yang berkomitmen untuk meningkatkan 
          kesejahteraan petani dan mendorong kemajuan sektor agribisnis di Indonesia. Melalui teknologi yang mudah diakses dan informasi yang relevan, kami membantu petani untuk mengelola usaha tani secara efisien, aman, dan menguntungkan.
        </p>
        <p class="mb-3">
          Untuk itu, kami menyediakan berbagai fitur utama, seperti:
        </p>
        <ul class="mb-3">
          <li>Informasi harga Padi terkini</li>
          <li>Data kualitas Padi</li>
          <li>Layanan pertanian seperti alat, jasa panen, pupuk</li>
          <li>Sistem pemantauan produksi dan penjualan secara tepat</li>
          <li>Jejaring langsung antara petani dan pembeli dengan transparansi harga dan dukungan pertanian modern</li>
        </ul>
        <p>
          Kami percaya, dengan informasi dan teknologi yang tepat, pertanian Indonesia bisa tumbuh lebih efisien dan berkelanjutan.
        </p>
      </div>

    </div>
  </div>
</section>

<section id="berita" class="berita section bg-success bg-opacity-25 py-5">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2 class="text-center text-success fw-bold mb-2">BERITA PERTANIAN</h2>
    <p class="text-center text-warning mb-5 fs-5">
      Semua yang perlu kamu tahu tentang pertanian, ada di sini.
    </p>

    <div class="d-flex align-items-center justify-content-center position-relative">
      <button id="beritaCarousel-prev" class="btn btn-success me-3" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
  &lt;
</button>

      <div id="beritaCarousel" class="carousel slide flex-grow-1" data-bs-ride="carousel" style="max-width: 1100px; margin: 0 auto;">
  <div class="carousel-inner">
    @foreach($berita->chunk(3) as $chunkIndex => $beritaChunk)
      <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
        <div class="row gx-4">  <!-- gx-4 = horizontal gap antar kolom -->
          @foreach($beritaChunk as $item)
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm" style="width: 100%; max-width: 350px; margin: 0 auto;">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}"  style="height: 200px; object-fit: cover; object-position: center;">
                <div class="card-body text-center">
                  <p class="card-text">
                    {{ Str::limit($item->isi, 100) }}
                  </p>
                  <a href="{{ route('berita.detail', $item->id_berita) }}" class="text-primary fw-semibold">Baca Selengkapnya !!</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
</div>

      <button id="beritaCarousel-next" class="btn btn-success ms-3" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
  &gt;
</button>

  </div>
</section>

<section id="harga" class="harga section py-5 bg-light">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2 class="text-center text-success mb-2 fw-bold">HARGA PADI</h2>
    <p class="text-center text-warning mb-5 fs-5">
      Update harga padi setiap hari agar kamu nggak ketinggalan info pasar.
    </p>

    <div class="d-flex align-items-center justify-content-center position-relative">
      <!-- Tombol kiri -->
      <button class="btn btn-success me-3" type="button" data-bs-target="#hargaCarousel" data-bs-slide="prev" style="z-index: 10;">
        &lt;
      </button>

      <div id="hargaCarousel" class="carousel slide flex-grow-1" data-bs-ride="carousel" data-bs-interval="5000" style="max-width: 1200px;">
        <div class="carousel-inner">
          @foreach($padi->chunk(3) as $chunkIndex => $padiChunk)
            <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
              <div class="row">
                @foreach($padiChunk as $item)
                  <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                      <img src="{{ asset('storage/' . $item->gambar) }}"
                           class="card-img-top"
                           alt="{{ $item->nama }}"
                           style="height: 200px; object-fit: cover;">
                      <div class="card-body text-center">
                        <h5 class="card-title text-dark fw-bold">{{ ucfirst($item->nama_padi) }}</h5>
                        <hr class="my-2">
                        <ul class="list-unstyled text-secondary small">
                          <li><strong>Warna:</strong> {{ $item->warna }}</li>
                          <li><strong>Tekstur:</strong> {{ $item->tekstur }}</li>
                          <li><strong>Bentuk:</strong> {{ $item->bentuk }}</li>
                          <li><strong>Harga/kg:</strong> 
                            <span class="text-success fw-semibold">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Tombol kanan -->
      <button class="btn btn-success ms-3" type="button" data-bs-target="#hargaCarousel" data-bs-slide="next" style="z-index: 10;">
        &gt;
      </button>
    </div>

  </div>
</section>

<section id="tips" class="tips section py-5" style="background-color: #D3EE98;">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-success">TIPS BERTANI</h2>
      <p class="text-center text-warning mb-5 fs-5">
      Tips praktis untuk hasil panen maksimal dan pertanian yang lebih efisien.
    </p>
    </div>

    <div class="row g-4">
      <!-- Tip 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mb-3 text-success fs-1">🌱</div>
            <h3 class="h5 fw-bold text-success">Pilih Benih</h3>
            <p class="mb-0">Pilih benih berkualitas tinggi untuk hasil panen yang lebih baik.</p>
          </div>
        </div>
      </div>

      <!-- Tip 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mb-3 text-success fs-1">🌿</div>
            <h3 class="h5 fw-bold text-success">Gunakan Pupuk</h3>
            <p class="mb-0">Gunakan pupuk secara bijak untuk menjaga tanaman tetap sehat.</p>
          </div>
        </div>
      </div>

      <!-- Tip 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mb-3 text-success fs-1">🐛</div>
            <h3 class="h5 fw-bold text-success">Pantau Hama</h3>
            <p class="mb-0">Pantau hama dan penyakit sejak dini.</p>
          </div>
        </div>
      </div>

      <!-- Tip 4 -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mb-3 text-success fs-1">🔄</div>
            <h3 class="h5 fw-bold text-success">Rotasi Tanaman</h3>
            <p class="mb-0">Lakukan rotasi tanaman untuk menjaga kesuburan tanah.</p>
          </div>
        </div>
      </div>

      <!-- Tip 5 -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mb-3 text-success fs-1">💧</div>
            <h3 class="h5 fw-bold text-success">Teknik Irigasi</h3>
            <p class="mb-0">Terapkan teknik irigasi yang efisien untuk menghemat air.</p>
          </div>
        </div>
      </div>

      <!-- Tip 6 -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mb-3 text-success fs-1">⏱️</div>
            <h3 class="h5 fw-bold text-success">Waktu Panen</h3>
            <p class="mb-0">Panen pada waktu yang tepat untuk kualitas hasil terbaik.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="kontak" class="contact section py-5 bg-light">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="fw-bold">Kontak</h2>
    <p class="lead">Ada pertanyaan atau butuh bantuan? Hubungi kami sekarang!</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <!-- Peta -->
    <div class="row gy-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d305.20709488841493!2d113.95634924356868!3d-7.8590460744844055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1747109575579!5m2!1sid!2sid" width="100%" height="270px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><!-- End Google Maps -->

    <div class="row gy-4">
      <!-- Kolom Informasi -->
      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300" >
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Alamat</h3>
            <p>Jl. Pertanian No. 123, Kota Agraris, Indonesia</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Kontak</h3>
            <p>+62 123 456 789</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email</h3>
            <p>info@pertanianindonesia.com</p>
          </div>
        </div><!-- End Info Item -->
      </div><!-- End Kolom Informasi -->

      <!-- Formulir Kontak -->
      <div class="col-lg-8">
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Nama Anda" required="">
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Email Anda" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subjek" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>

              <button type="submit" >Kirim Pesan</button>
            </div>
          </div>
        </form>
      </div><!-- End Formulir Kontak -->
    </div>
  </div>
</section>

@endsection

<style>
  #beritaCarousel-prev,
  #beritaCarousel-next {
    position: absolute;
    background-color: #198754;
    border: none;
    width: 40px;
    height: 40px;
    opacity: 0.8;
    top: 60%; /* posisinya sedikit di bawah tengah */
    transform: translateY(-50%);
    z-index: 1000;
    cursor: pointer;
  }

  #beritaCarousel-prev {
    left: 0;
    border-radius: 0 5px 5px 0;
  }

  #beritaCarousel-next {
    right: 0;
    border-radius: 5px 0 0 5px;
  }
</style>