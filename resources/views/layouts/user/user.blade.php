<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pasca Panen Padi</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/images/logos/logoapk.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>




  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    /* Background putih */
    .header {
        background: white !important;
    }

    /* Warna menu hijau */
    .nav-link, 
    .dropdown > a,
    .btn-getstarted {
        color: #2e7d32 !important;
    }

    /* Warna saat hover */
    .nav-link:hover,
    .nav-link.active,
    .dropdown > a:hover {
        color: #1b5e20 !important;
    }
</style>

<!-- CSS Styles -->
<style>
  .light-green-bg {
    background-color: #e8f5e9; /* Warna hijau muda */
    color: #333; /* Warna teks lebih gelap untuk kontras */
  }
  
  .footer {
    padding: 30px 0 15px; /* Diperkecil dari 60px 0 30px */
  }
  
  .footer-top {
    padding-bottom: 15px; /* Jarak bawah konten footer */
  }
  
  .footer h4 {
    color: #2e7d32; /* Warna hijau lebih gelap untuk judul */
    margin-bottom: 20px;
    font-weight: 600;
  }
  
  .footer-links li, .footer-hours li {
    margin-bottom: 10px;
  }
  
  .footer-contact p, .footer-hours p {
    margin-bottom: 5px;
  }
  
  .footer-contact strong {
    color: #2e7d32;
  }
  
  .newsletter-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
    border: 1px solid #a5d6a7;
  }
  
  .newsletter-form button {
    background: #2e7d32; /* Warna hijau lebih gelap */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .newsletter-form button:hover {
    background: #1b5e20; /* Warna hijau lebih gelap saat hover */
  }
  
  .credits a {
    color: #2e7d32;
    text-decoration: none;
  }
  
  .credits a:hover {
    text-decoration: underline;
  }
  
  /* Warna untuk ikon dan link */
  .footer-links a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s;
  }
  
  .footer-links a:hover {
    color: #2e7d32;
  }
  
  .bi-chevron-right {
    color: #2e7d32;
    font-size: 0.8rem;
  }
  .copyright {
    padding: 10px 0; /* Diperkecil dari 20px 0 */
  }
</style>

  <!-- =======================================================
  * Template Name: Gp
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Updated: Aug 15 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

@include('layouts.user.header')
@yield("content")
@include('layouts.user.footer')

 <!-- Vendor JS Files -->
 <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
 <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

 <!-- Main JS File -->
 <script src="{{ asset('assets/js/main.js') }}"></script>

 <script>
   AOS.init();
 </script>
</body>