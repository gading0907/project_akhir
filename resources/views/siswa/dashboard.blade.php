@extends('layouts.siswa')

@section('content')
<div class="min-vh-100 bg-light">
    <!-- Modern Hero Section -->
    <div class="bg-dark py-5 mb-4 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-opacity-75" 
             style="background: linear-gradient(120deg, #2b4162 0%, #12100e 100%);">
        </div>
        <div class="container py-4 position-relative">
            <div class="row align-items-center g-4">
                <div class="col-auto">
                    <!-- Logo Ujian -->
                    <div class="bg-white rounded-4 p-3 shadow-lg d-flex align-items-center justify-content-center" 
                         style="width: 100px; height: 100px;">
                        <i class="fas fa-book-reader text-primary fa-3x"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="text-white">
                        <h1 class="display-5 fw-bolder mb-2">
                            Selamat Datang di E-Learning
                        </h1>
                        <p class="fs-5 text-white-50 mb-3">
                            {{ $siswa->nama_siswa }} | {{ $siswa->kelas }} | {{ $siswa->jurusan }}
                        </p>
                        <div class="d-flex flex-wrap gap-4">
                            <div class="bg-black bg-opacity-25 px-4 py-2 rounded-pill">
                                <i class="fas fa-id-badge text-info me-2"></i>
                                <span class="text-white-50">ID SISWA : {{ $siswa->id_siswa }}</span>
                            </div>
                            @if(!is_null($siswa->nilai_rata_rata))
                            <div class="bg-black bg-opacity-25 px-4 py-2 rounded-pill">
                                <i class="fas fa-star text-warning me-2"></i>
                                <span class="text-white-50">Nilai : {{ number_format($siswa->nilai_rata_rata, 1) }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi Remedial -->
    @if(!is_null($siswa->nilai_rata_rata) && $siswa->nilai_rata_rata < 70)
        <div class="container">
            <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-exclamation-triangle fa-lg me-2"></i>
                <div>
                    Nilai rata-rata Anda di bawah 70. Silakan ikuti remedial untuk meningkatkan nilai Anda.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container pb-5">
        <!-- Modern Statistics Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-4 me-3">
                                <i class="fas fa-book-open text-primary fa-2x"></i>
                            </div>
                            <div>
                                <div class="text-muted small mb-1">Mata Pelajaran</div>
                                <h2 class="display-6 fw-bold text-primary mb-0">{{ $mataPelajaran->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-3 rounded-4 me-3">
                                <i class="fas fa-tasks text-success fa-2x"></i>
                            </div>
                            <div>
                                <div class="text-muted small mb-1">Total Soal</div>
                                <h2 class="display-6 fw-bold text-success mb-0">{{ $mataPelajaran->sum('soal_count') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 p-3 rounded-4 me-3">
                                <i class="fas fa-chart-line text-info fa-2x"></i>
                            </div>
                            <div>
                                <div class="text-muted small mb-1">Nilai Rata-Rata</div>
                                <h2 class="display-6 fw-bold text-info mb-0">
                                    {{ !is_null($siswa->nilai_rata_rata) ? number_format($siswa->nilai_rata_rata, 1) : '-' }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mata Pelajaran -->
        <div class="row g-4">
            @forelse ($mataPelajaran as $mapel)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-4">
                                    <i class="fas fa-graduation-cap text-primary fa-2x"></i>
                                </div>
                                <h3 class="h4 fw-bold ms-3 mb-0">
                                    {{ $mapel->mata_pelajaran }}
                                </h3>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small">Progress Pembelajaran</span>
                                    <span class="badge bg-dark rounded-pill px-3">{{ $mapel->soal_count }} Soal</span>
                                </div>
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" 
                                         role="progressbar"
                                         style="width: {{ min(($mapel->soal_count / 10) * 100, 100) }}%"
                                         aria-valuenow="{{ min(($mapel->soal_count / 10) * 10, 10) }}"
                                         aria-valuemin="0" aria-valuemax="10">
                                    </div>
                                </div>
                            </div>
                            
                            @php
                                $nilaiMapel = $siswa->{'nilai_' . Str::snake($mapel->mata_pelajaran)};
                            @endphp

                            @if (is_null($nilaiMapel))
                                <a href="{{ route('siswa.show.soal', $mapel->mata_pelajaran_id) }}"
                                   class="btn btn-dark btn-lg w-100 rounded-pill d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-play-circle"></i>
                                    <span>Mulai Belajar</span>
                                </a>
                            @else
                                @if ($nilaiMapel < 70)
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('siswa.show.soal', $mapel->mata_pelajaran_id) }}"
                                           class="btn btn-warning btn-lg rounded-pill d-flex align-items-center justify-content-center gap-2">
                                            <i class="fas fa-redo"></i>
                                            <span>Mulai Remedial</span>
                                        </a>
                                        <div class="text-center text-danger small">
                                            <i class="fas fa-info-circle"></i> Nilai saat ini: {{ number_format($nilaiMapel, 1) }}
                                        </div>
                                    </div>
                                @else
                                    <div class="d-grid">
                                        <button class="btn btn-success btn-lg rounded-pill d-flex align-items-center justify-content-center gap-2" disabled>
                                            <i class="fas fa-check-circle"></i>
                                            <span>Nilai: {{ number_format($nilaiMapel, 1) }}</span>
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div class="bg-dark bg-opacity-10 p-4 rounded-4 d-inline-block mb-4">
                                    <i class="fas fa-books text-dark fa-3x"></i>
                                </div>
                                <h2 class="h3 fw-bold mb-3">Belum Ada Mata Pelajaran</h2>
                                <p class="text-muted mb-0 lead">
                                    Materi pembelajaran akan segera ditambahkan.<br>
                                    Silakan periksa kembali nanti.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endsection