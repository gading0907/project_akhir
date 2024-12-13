<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Admin Dashboard</title>
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light" style="font-family: 'Poppins', sans-serif;">
    <div class="d-flex">
        <!-- Elegant Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-primary" 
             style="width: 280px; min-height: 100vh; position: fixed; top: 0; left: 0; overflow-y: auto;">
            <div class="text-center p-3 border-bottom border-white border-opacity-25">
                <h2 class="h4 mb-0">
                    <i class="fas fa-graduation-cap me-2"></i>
                    Admin Panel
                </h2>
            </div>

            <ul class="nav nav-pills flex-column mb-auto mt-3">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-white bg-opacity-25' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('soal.index') }}" 
                       class="nav-link text-white {{ request()->routeIs('soal.*') ? 'active bg-white bg-opacity-25' : '' }}">
                        <i class="fas fa-file-alt me-2"></i>
                        Manage Soal
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.siswa.index') }}" 
                       class="nav-link text-white {{ request()->routeIs('admin.siswa.index') ? 'active bg-white bg-opacity-25' : '' }}">
                        <i class="fas fa-user-graduate me-2"></i>
                        Manage Siswa
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none w-100 text-start">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-grow-1" style="margin-left: 280px;">
            <!-- Content Container -->
            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
