@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary">
                    <h3 class="text-center font-weight-light my-4 text-white">
                        <i class="fas fa-edit me-2"></i>Edit Soal
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-exclamation-triangle me-2"></i>Oops!</strong> Ada beberapa masalah dengan input Anda.
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('soal.update', $soal->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Input Tersembunyi Mata Pelajaran ID -->
                        <input type="hidden" name="mata_pelajaran_id" value="{{ $mataPelajaran_id }}">

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="soal" name="soal" style="height: 100px" required>{{ old('soal', $soal->soal) }}</textarea>
                                    <label for="soal">
                                        <i class="fas fa-question-circle me-2"></i>Pertanyaan
                                    </label>
                                    <div class="invalid-feedback">
                                        Pertanyaan harus diisi
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_a" name="soal_a" value="{{ old('soal_a', $soal->soal_a) }}" placeholder="Pilihan A" required>
                                    <label for="soal_a">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan A
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_b" name="soal_b" value="{{ old('soal_b', $soal->soal_b) }}" placeholder="Pilihan B" required>
                                    <label for="soal_b">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan B
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_c" name="soal_c" value="{{ old('soal_c', $soal->soal_c) }}" placeholder="Pilihan C" required>
                                    <label for="soal_c">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan C
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_d" name="soal_d" value="{{ old('soal_d', $soal->soal_d) }}" placeholder="Pilihan D" required>
                                    <label for="soal_d">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan D
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" id="kunci_jawaban" name="kunci_jawaban" required>
                                        <option value="" disabled>Pilih jawaban yang benar</option>
                                        <option value="A" {{ old('kunci_jawaban', $soal->kunci_jawaban) == 'A' ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ old('kunci_jawaban', $soal->kunci_jawaban) == 'B' ? 'selected' : '' }}>B</option>
                                        <option value="C" {{ old('kunci_jawaban', $soal->kunci_jawaban) == 'C' ? 'selected' : '' }}>C</option>
                                        <option value="D" {{ old('kunci_jawaban', $soal->kunci_jawaban) == 'D' ? 'selected' : '' }}>D</option>
                                    </select>
                                    <label for="kunci_jawaban">
                                        <i class="fas fa-key me-2"></i>Kunci Jawaban
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="btn btn-secondary" href="{{ route('soal.index') }}">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Update Soal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
@endsection
