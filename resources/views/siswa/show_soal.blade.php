@extends('layouts.siswa')

@section('content')
<div class="min-vh-100 bg-light">
    <!-- Hero Section -->
    <div class="bg-primary bg-opacity-10 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 bg-white shadow-lg rounded-4">
                        <div class="card-body p-0">
                            <div class="bg-primary bg-gradient p-5 text-center text-md-start">
                                <div class="row align-items-center">
                                    <div class="col-md-2 mb-3 mb-md-0">
                                        <div class="bg-white d-inline-flex p-3 rounded-4 shadow">
                                            <i class="fas fa-graduation-cap fa-3x text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <h1 class="display-6 fw-bold text-white mb-2">{{ $mataPelajaran->mata_pelajaran }}</h1>
                                        <p class="lead text-white-50 mb-0">Silahkan mengerjakan ujian dengan teliti dan jujur</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Progress Section -->
                <div class="card border-0 shadow-lg rounded-4 mb-5">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="fw-bold mb-1">Progress Pengerjaan</h4>
                                <p class="text-muted mb-md-0">Telah menjawab <span class="progress-count fw-bold text-primary">0</span> dari {{ count($soal) }} soal</p>
                            </div>
                            <div class="col-md-6">
                                <div class="progress rounded-pill bg-light border" style="height: 15px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                                         role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quiz Form -->
                <form action="{{ route('siswa.submit.soal', $mataPelajaran->mata_pelajaran_id) }}" method="POST">
                    @csrf
                    @foreach ($soal as $item)
                        <div class="card border-0 shadow-lg rounded-4 mb-4 position-relative overflow-hidden">
                            <!-- Question Number Badge -->
                            <div class="position-absolute top-0 start-0 bg-primary text-white p-3 rounded-end-4 shadow">
                                <h5 class="mb-0 fw-bold">#{!! $loop->iteration !!}</h5>
                            </div>

                            <div class="card-body p-5">
                                <!-- Question Text -->
                                <div class="ms-5 mb-4">
                                    <h5 class="fw-bold mb-0">{{ $item->soal }}</h5>
                                </div>

                                <!-- Answer Options -->
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        @foreach (['a', 'b', 'c', 'd'] as $option)
                                            <div class="card mb-3 border-0 bg-light">
                                                <div class="card-body">
                                                    <div class="form-check d-flex align-items-center p-0">
                                                        <input type="radio" 
                                                               id="jawaban_{{ $item->id }}_{{ $option }}" 
                                                               name="jawaban[{{ $item->id }}]" 
                                                               value="{{ $option }}" 
                                                               class="form-check-input m-0 me-3 fs-4"
                                                               required>
                                                        <label class="form-check-label flex-grow-1 py-2" 
                                                               for="jawaban_{{ $item->id }}_{{ $option }}">
                                                            {{ $item['soal_' . $option] }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Border Accent -->
                            <div class="bg-primary py-1"></div>
                        </div>
                    @endforeach

                    <!-- Submit Button Section -->
                    <div class="card border-0 shadow-lg rounded-4 bg-white p-4 text-center">
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">
                                <i class="fas fa-paper-plane me-2"></i>
                                Submit Jawaban
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const progressBar = document.querySelector('.progress-bar');
    const progressCounts = document.querySelectorAll('.progress-count');
    const totalQuestions = {{ count($soal) }};
    const submitBtn = document.querySelector('button[type="submit"]');

    function updateProgress() {
        const answered = document.querySelectorAll('input[type="radio"]:checked').length;
        const percentage = (answered / totalQuestions) * 100;
        
        progressBar.style.width = percentage + '%';
        progressCounts.forEach(count => count.textContent = answered);

        if (answered === totalQuestions) {
            submitBtn.classList.remove('btn-primary');
            submitBtn.classList.add('btn-success');
        } else {
            submitBtn.classList.remove('btn-success');
            submitBtn.classList.add('btn-primary');
        }
    }

    // Auto scroll to next question
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', (e) => {
            const currentCard = e.target.closest('.card');
            const nextCard = currentCard.nextElementSibling;
            if (nextCard && nextCard.classList.contains('card')) {
                nextCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            updateProgress();
        });
    });
});
</script>
@endpush
@endsection