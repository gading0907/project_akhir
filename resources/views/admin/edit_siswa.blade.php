@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4 bg-light">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Header Card -->
            <div class="card bg-gradient-primary border-0 rounded-3 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="text-white mb-2 fw-bold">Edit Data Siswa</h2>
                            <p class="text-white-50 mb-0">Perbarui data siswa di formulir berikut</p>
                        </div>
                        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                            <a href="{{ route('siswa.index') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <!-- Basic Information Section -->
                        <div class="bg-light rounded-3 p-4 mb-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-user-circle text-primary me-2"></i>
                                Informasi Dasar
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="id_siswa" name="id_siswa" value="{{ $siswa->id_siswa }}" readonly>
                                        <label for="id_siswa">ID Siswa</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <div class="invalid-feedback">Nama siswa wajib diisi</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information Section -->
                        <div class="bg-light rounded-3 p-4 mb-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-graduation-cap text-success me-2"></i>
                                Informasi Akademik
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required>
                                        <label for="kelas">Kelas</label>
                                        <div class="invalid-feedback">Kelas wajib diisi</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $siswa->jurusan }}" required>
                                        <label for="jurusan">Jurusan</label>
                                        <div class="invalid-feedback">Jurusan wajib diisi</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}" required>
                                        <label for="email">Email</label>
                                        <div class="invalid-feedback">Email wajib diisi dengan format yang benar</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Grades Section -->
                        <div class="bg-light rounded-3 p-4 mb-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-chart-line text-warning me-2"></i>
                                Nilai Akademik
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="nilai_bahasa_indonesia" 
                                               name="nilai_bahasa_indonesia" value="{{ $siswa->nilai_bahasa_indonesia }}" 
                                               min="0" max="100" required>
                                        <label for="nilai_bahasa_indonesia">Nilai Bahasa Indonesia</label>
                                        <div class="invalid-feedback">Nilai harus diisi (0-100)</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="nilai_informatika" 
                                               name="nilai_informatika" value="{{ $siswa->nilai_informatika }}" 
                                               min="0" max="100" required>
                                        <label for="nilai_informatika">Nilai Informatika</label>
                                        <div class="invalid-feedback">Nilai harus diisi (0-100)</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="nilai_pendidikan_pancasila" 
                                               name="nilai_pendidikan_pancasila" value="{{ $siswa->nilai_pendidikan_pancasila }}" 
                                               min="0" max="100" required>
                                        <label for="nilai_pendidikan_pancasila">Nilai Pendidikan Pancasila</label>
                                        <div class="invalid-feedback">Nilai harus diisi (0-100)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('siswa.index') }}" class="btn btn-light btn-lg px-5">
                                <i class="fas fa-times-circle me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endsection
