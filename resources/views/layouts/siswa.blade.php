<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 280px;
            --header-height: 60px;
            --primary-color: #4e73df;
            --secondary-color: #224abe;
            --text-color: #f8f9fa;
            --hover-color: #ffffff;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f8f9fc;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar-wrapper {
            position: fixed;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            z-index: 1000;
            transition: all var(--transition-speed) ease;
        }

        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            color: var(--text-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .menu-item {
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            border-left: 4px solid transparent;
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: var(--hover-color);
            border-left-color: var(--hover-color);
        }

        .logout-button {
            width: 100%;
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            background: none;
            border: none;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            border-left: 4px solid transparent;
            text-align: left;
        }

        .logout-button:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--hover-color);
            border-left-color: var(--hover-color);
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            background-color: #f8f9fc;
            transition: all var(--transition-speed) ease;
            padding: 1.5rem;
        }

        /* Content Header Styles */
        .content-header {
            background: white;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, 0.15);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar-wrapper {
                transform: translateX(-100%);
            }

            .sidebar-wrapper.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Card Styles */
        .dashboard-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, 0.15);
            transition: transform var(--transition-speed) ease;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar-wrapper">
        <div class="sidebar-header">
            <h2><i class="fas fa-user-graduate me-2"></i>Siswa Panel</h2>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('siswa_dashboard') }}" class="menu-item {{ request()->routeIs('siswa_dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Toggle Sidebar for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.createElement('button');
            menuToggle.classList.add('btn', 'btn-primary', 'd-md-none');
            menuToggle.style.position = 'fixed';
            menuToggle.style.top = '1rem';
            menuToggle.style.left = '1rem';
            menuToggle.style.zIndex = '1001';
            menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            
            document.body.appendChild(menuToggle);
            
            menuToggle.addEventListener('click', function() {
                document.querySelector('.sidebar-wrapper').classList.toggle('active');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const sidebar = document.querySelector('.sidebar-wrapper');
                const sidebarButton = document.querySelector('.btn-primary.d-md-none');
                
                if (!sidebar.contains(event.target) && !sidebarButton.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            });
        });

        // Active menu item
        const currentLocation = window.location.href;
        document.querySelectorAll('.menu-item').forEach(item => {
            if (item.href === currentLocation) {
                item.classList.add('active');
            }
        });
    </script>
</body>
</html>