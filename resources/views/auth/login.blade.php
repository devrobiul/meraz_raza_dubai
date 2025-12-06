<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Meraz Raza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset(setting('favicon')) }}" type="image/x-icon">
    <style>
        body {
            background: #000;
        }

        .card {
            border-radius: 12px;
        }

        .input-group-text {
            background: #f8f9fa;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ff7829;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <!-- Logo -->
                        <div class="text-center mb-1">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset(setting('primary_logo')) }}" alt="Logo" class="img-fluid" style="width:120px;">
                            </a>
                        </div>

                        <h4 class="text-center mb-3">Welcome back!</h4>

                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ri-mail-line"></i></span>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="name@example.com">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if (session('error'))
                                    <span class="text-danger"><i>{{ session('error') }}</i></span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ri-lock-line"></i></span>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                      

                            <!-- Submit -->
                            <button class="btn btn-danger text-light w-100 mb-3">
                                <i class="ri-login-box-line me-2"></i>Sign In
                            </button>
                        </form>


                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-3">
                    <p class="text-light mb-0">© {{ date('Y') }} Meraz raza all right reserved.</p>
                    <p class="text-light mb-0">Developed by
                        <a href="https://raidaitbd.com" target="_blank" class="text-light">Mohammad Robiul Hossain</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
