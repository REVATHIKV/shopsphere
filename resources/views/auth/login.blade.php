
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopSphere Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width: 450px;">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h3 mb-4">ShopSphere Login</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    Please check your email and password.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email"
                           class="form-control" value="{{ old('email') }}"
                           autocomplete="username" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password"
                           class="form-control" autocomplete="current-password"
                           required>
                </div>

                <div class="form-check mb-3">
                    <input id="remember" name="remember" type="checkbox"
                           class="form-check-input" value="1">
                    <label for="remember" class="form-check-label">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Log In
                </button>
            </form>

            <p class="mt-3 mb-0 text-center">
                <a href="{{ route('register') }}">Create an account</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
