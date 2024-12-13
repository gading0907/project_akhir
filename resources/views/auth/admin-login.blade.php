<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h2 class="text-primary">Admin</h2>
                    <p class="text-muted">Welcome back</p>
                </div>
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary">Nama Admin</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your admin name" required>
                            <span class="input-group-text bg-light"><i class="fas fa-user text-muted"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-secondary">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            <span class="input-group-text bg-light password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye text-muted"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Login to Dashboard
                    </button>
                </form>
                <div class="text-center mt-4">
                    <p class="text-secondary">Anda Siswa? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
