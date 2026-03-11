<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom right, #e6f4ea, #cce5d1);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .forgot-header {
            background: linear-gradient(135deg, #198754, #157347);
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            padding: 2rem 1.5rem;
            text-align: center;
            color: #fff;
        }

        .forgot-header h4 {
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
            color: #198754;
        }

        .btn-success {
            background-color: #198754;
            border: none;
        }

        .btn-success:hover {
            background-color: #157347;
        }

        .alert-success {
            background-color: #d1e7dd;
            border-color: #badbcc;
            color: #0f5132;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center py-5" style="min-height: 100vh;">
    <div class="col-md-10 col-lg-6 col-xl-5">
        <div class="card">
            <div class="forgot-header">
                <h4>Lupa Password?</h4>
                <p class="mb-0 small">
                    Masukkan email Anda dan kami akan mengirimkan tautan untuk mereset kata sandi Anda.
                </p>
            </div>

            <div class="card-body p-4">
                <!-- Status Sesi -->
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success btn-lg rounded-3">
                            Kirim Link Reset Password
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-decoration-none text-success">
                        <small>← Kembali ke halaman login</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
