<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #e6f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            background-color: #198754;
            border-top-left-radius: 1.25rem;
            border-top-right-radius: 1.25rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
        }

        .login-header h3 {
            margin: 0;
            font-weight: bold;
        }

        .login-header p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
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

        .form-check-label {
            color: #555;
        }

        .forgot-link {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .forgot-link:hover {
            color: #157347;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-12" style="max-width: 400px;">
        <div class="card login-card">
            <div class="login-header">
                <h3>Selamat Datang</h3>
                <p>Silakan login untuk melanjutkan</p>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email atau Username -->
                    <div class="mb-3">
                        <label for="login" class="form-label">Email atau Username</label>
                        <input id="login" type="text" class="form-control rounded-3 @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autofocus>
                        @error('login')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control rounded-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>

                    <!-- Tombol & Link -->
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a class="forgot-link text-decoration-none" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif

                        <button type="submit" class="btn btn-success px-4 rounded-3">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
