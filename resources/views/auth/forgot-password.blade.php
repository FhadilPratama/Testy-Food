<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, #f5f7fa, #c3cfe2); font-family: 'Segoe UI', sans-serif;">

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-5 col-lg-4">
        <div class="card p-4 shadow rounded-4">
            <h4 class="text-center mb-3">Reset Password</h4>
            <p class="text-muted text-center small">Masukkan email Anda, kami akan kirim link reset</p>

            @if (session('status'))
                <div class="alert alert-success small text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="small text-decoration-none text-muted">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
