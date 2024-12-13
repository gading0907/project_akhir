@extends('layouts.siswa')

@section('content')
<div class="min-vh-100 bg-light d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <!-- Header dengan background gradient -->
                    <div class="bg-primary bg-gradient text-white p-4 text-center">
                        <div class="d-inline-block bg-white bg-opacity-10 rounded-circle p-3 mb-3">
                            <i class="fas fa-award fa-2x text-white"></i>
                        </div>
                        <h2 class="h4 mb-0">Hasil Penilaian</h2>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        <!-- Subject Info -->
                        <div class="text-center mb-4">
                            <span class="badge bg-light text-primary px-3 py-2 fs-6 mb-2">
                                <i class="fas fa-book me-2"></i>
                                {{ $mataPelajaran->mata_pelajaran }}
                            </span>
                        </div>

                        <!-- Score Display -->
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <div class="progress rounded-pill" style="width: 120px; height: 120px;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" 
                                         role="progressbar" 
                                         style="width: {{ $nilai }}%" 
                                         aria-valuenow="{{ $nilai }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <span class="display-4 fw-bold text-white">
                                        {{ $nilai }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Grade Category -->
                        <div class="text-center mb-4">
                            <span class="badge {{ $nilai >= 90 ? 'bg-success' : ($nilai >= 70 ? 'bg-primary' : 'bg-danger') }} px-4 py-2">
                                @if($nilai >= 90)
                                    <i class="fas fa-star me-1"></i> Sangat Baik
                                @elseif($nilai >= 70)
                                    <i class="fas fa-check-circle me-1"></i> Baik
                                @else
                                    <i class="fas fa-exclamation-circle me-1"></i> Perlu Ditingkatkan
                                @endif
                            </span>
                        </div>

                        <!-- Message -->
                        <div class="text-center mb-4">
                            <p class="text-muted mb-0">
                                @if($nilai >= 90)
                                    Selamat! Anda telah menunjukkan pemahaman yang luar biasa.
                                @elseif($nilai >= 70)
                                    Bagus! Anda telah menunjukkan pemahaman yang baik.
                                @else
                                    Jangan menyerah! Terus belajar dan tingkatkan pemahamanmu.
                                @endif
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center">
                            <a href="{{ route('siswa.dashboard') }}" class="btn btn-primary btn-lg px-5 rounded-pill">
                                <i class="fas fa-home me-2"></i>
                                Kembali ke Dashboard
                            </a>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light border-0 p-4 text-center">
                        <p class="small text-muted mb-0">
                            <i class="fas fa-clock me-1"></i>
                            Selesai pada {{ date('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

@push('styles')
<style>
    /* Circular Progress Animation */
    .progress {
        position: relative;
        border-radius: 50% !important;
        overflow: hidden;
    }

    .progress::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        height: 90%;
        background: white;
        border-radius: 50%;
    }

    /* Button Hover Animation */
    .btn-lg {
        transition: all 0.3s ease;
    }

    .btn-lg:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.15);
    }

    /* Badge Animation */
    .badge {
        transition: all 0.3s ease;
    }

    .badge:hover {
        transform: scale(1.05);
    }

    /* Card Animation */
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate score number counting up
    const score = {{ $nilai }};
    const duration = 1500;
    const steps = 60;
    const increment = score / steps;
    let current = 0;
    const display = document.querySelector('.display-4');
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= score) {
            display.textContent = score;
            clearInterval(timer);
        } else {
            display.textContent = Math.round(current);
        }
    }, duration / steps);
});
</script>
@endpush
@endsection