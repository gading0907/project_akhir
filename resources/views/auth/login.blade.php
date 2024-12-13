<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h2 class="text-center text-dark font-weight-bold mb-4">Login Siswa</h2>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('proses_login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <div class="input-group">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold">Login</button>
                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-2">Belum registrasi? <a href="{{ route('register') }}" class="text-primary font-weight-bold">Daftar</a></p>
                            <p>Admin? <a href="{{ route('admin.login') }}" class="text-primary font-weight-bold">Login Admin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
