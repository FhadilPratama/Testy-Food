<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .login-title {
            font-weight: 600;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-5 col-lg-4">
            <div class="card login-card p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle text-primary" style="font-size: 3rem;"></i>
                    <div class="login-title mt-2">Silakan Login</div>
                    <p class="text-muted small">Masukkan email dan password Anda</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger small text-center">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success small text-center">
                        {{ session('status') }}
                    </div>
                @endif


                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="your@email.com" required
                                autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="{{ route('password.request') }}" class="small text-decoration-none text-primary">Lupa
                            password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>