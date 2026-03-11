<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e6f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .verify-card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .verify-header {
            background-color: #198754;
            border-top-left-radius: 1.25rem;
            border-top-right-radius: 1.25rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
        }

        .btn-success {
            background-color: #198754;
            border: none;
        }

        .btn-success:hover {
            background-color: #157347;
        }

        .btn-link {
            color: #6c757d;
            text-decoration: underline;
        }

        .btn-link:hover {
            color: #157347;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-10" style="max-width: 500px;">
        <div class="card verify-card">
            <div class="verify-header">
                <h4>Verifikasi Email Anda</h4>
            </div>

            <div class="card-body p-4">
                <p class="text-muted mb-4">
                    {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan. Jika Anda belum menerima email tersebut, kami akan mengirimkan ulang.') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success" role="alert">
                        {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <!-- Kirim ulang verifikasi -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-3">
                            {{ __('Kirim Ulang Email Verifikasi') }}
                        </button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">
                            {{ __('Keluar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
