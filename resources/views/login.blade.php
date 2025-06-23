<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management - Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }

        .login-box {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 420px;
        }

        .login-header h2 {
            color: #0d6efd;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            padding: 0.6rem;
            font-size: 1rem;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        .forgot-password {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-header text-center mb-4">
                <h2 class="fw-bold">Store Management</h2>
                <p class="text-muted mb-0">Sign in to your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }} " placeholder="Enter your email">
                    @error('email')
                        <div class="text-danger small mt-1 ms-2">{{ $message }} </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    @error('password')
                        <div class="text-danger small mt-1 ms-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </button>
                </div>

                <div class="text-center">
                    <a href="#" class="text-decoration-none text-primary forgot-password">
                        Forgot your password?
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
