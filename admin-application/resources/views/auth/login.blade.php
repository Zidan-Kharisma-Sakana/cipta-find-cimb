<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F9F9F9;
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #FFFFFF;
        }
        .btn-login {
            background-color: #C8102E;
            color: #FFFFFF;
        }
        .btn-login:hover {
            background-color: #A00B23;
            color: #E0E0E0;
        }
        .form-control {
            border-radius: 5px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 120px;
        }
        .form-text {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login-container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <img src="{{ asset('cimb.png') }}" alt="CIMB Niaga Logo" class="logo">
                    <h3>Admin Login</h3>
                </div>
                <!-- Tampilkan error jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <!-- Form login -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
