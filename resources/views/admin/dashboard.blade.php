@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Header -->
    <div class="bg-primary text-white p-4 mb-4 rounded shadow">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="display-5 mb-0">Selamat Datang, Admin</h1>
                <p class="lead mb-0">Di sini Anda bisa mengelola soal, melihat data siswa, dan fitur lainnya.</p>
            </div>
            <i class="bi bi-person-circle display-4"></i>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
        <!-- Total Soal -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 bg-light bg-gradient">
                <div class="card-body position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-secondary mb-2">Soal</h6>
                        </div>
                        <div class="rounded-circle p-3 bg-primary text-white shadow-sm d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-text fs-3"></i>
                        </div>
                    </div>
                    <a href="{{ route('soal.index') }}" class="btn btn-primary btn-sm mt-4 stretched-link">Kelola Soal</a>
                </div>
            </div>
        </div>

        <!-- Total Siswa -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 bg-light bg-gradient">
                <div class="card-body position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-secondary mb-2">Siswa</h6>
                        </div>
                        <div class="rounded-circle p-3 bg-success text-white shadow-sm d-flex align-items-center justify-content-center">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                    </div>
                    <a href="{{ route('siswa.index') }}" class="btn btn-success btn-sm mt-4 stretched-link">Lihat Siswa</a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 bg-light bg-gradient">
                <div class="card-body">
                    <h6 class="text-uppercase text-secondary mb-4">Aksi Cepat</h6>
                    <div class="d-grid gap-3">
                        <button class="btn btn-outline-primary" onclick="window.location='{{ route('soal.create') }}'">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Soal Baru
                        </button>
                        <!-- <button class="btn btn-outline-success" onclick="window.location='{{ route('siswa.create') }}'">
                            <i class="bi bi-person-plus me-2"></i>Daftarkan Siswa
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold text-primary">Aktivitas Terbaru</h5>
        </div>
        
    </div>
</div>
@endsection
