@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary">
                    <h3 class="text-center font-weight-light my-4 text-white">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Soal Baru
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

                    <form action="{{ route('soal.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- Input tersembunyi untuk mata_pelajaran_id -->
                        <input type="hidden" name="mata_pelajaran_id" value="{{ $mataPelajaran_id }}">

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="soal" name="soal" style="height: 100px" required></textarea>
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
                                    <input type="text" class="form-control" id="soal_a" name="soal_a" placeholder="Pilihan A" required>
                                    <label for="soal_a">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan A
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_b" name="soal_b" placeholder="Pilihan B" required>
                                    <label for="soal_b">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan B
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_c" name="soal_c" placeholder="Pilihan C" required>
                                    <label for="soal_c">
                                        <i class="fas fa-check-circle me-2"></i>Pilihan C
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="soal_d" name="soal_d" placeholder="Pilihan D" required>
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
                                        <option value="" selected disabled>Pilih jawaban yang benar</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                    <label for="kunci_jawaban">
                                        <i class="fas fa-key me-2"></i>Kunci Jawaban
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="btn btn-secondary" href="#">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Soal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk validasi form -->
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
