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
                            <h2 class="text-white mb-2 fw-bold">Tambah Data Siswa</h2>
                            <p class="text-white-50 mb-0">Lengkapi formulir berikut untuk menambahkan data siswa baru</p>
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
                    <form action="{{ route('siswa.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Basic Information Section -->
                        <div class="bg-light rounded-3 p-4 mb-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-user-circle text-primary me-2"></i>
                                Informasi Dasar
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="id_siswa" name="id_siswa" placeholder="ID Siswa" required>
                                        <label for="id_siswa">ID Siswa</label>
                                        <div class="invalid-feedback">ID Siswa wajib diisi</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" required>
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <div class="invalid-feedback">Nama Siswa wajib diisi</div>
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
                                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
                                        <label for="kelas">Kelas</label>
                                        <div class="invalid-feedback">Kelas wajib diisi</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="jurusan" name="jurusan" required>
                                            <option value="" disabled selected>Pilih Jurusan</option>
                                            <option value="RPL">RPL</option>
                                            <option value="TKJ">TKJ</option>
                                            <option value="AKUNTANSI">AKUNTANSI</option>
                                        </select>
                                        <label for="jurusan">Jurusan</label>
                                        <div class="invalid-feedback">Jurusan wajib dipilih</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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
                                               name="nilai_bahasa_indonesia" placeholder="Nilai Bahasa Indonesia" 
                                               min="0" max="100" required>
                                        <label for="nilai_bahasa_indonesia">Nilai Bahasa Indonesia</label>
                                        <div class="invalid-feedback">Nilai harus diisi (0-100)</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="nilai_informatika" 
                                               name="nilai_informatika" placeholder="Nilai Informatika" 
                                               min="0" max="100" required>
                                        <label for="nilai_informatika">Nilai Informatika</label>
                                        <div class="invalid-feedback">Nilai harus diisi (0-100)</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="nilai_pendidikan_pancasila" 
                                               name="nilai_pendidikan_pancasila" placeholder="Nilai Pendidikan Pancasila" 
                                               min="0" max="100" required>
                                        <label for="nilai_pendidikan_pancasila">Nilai Pendidikan Pancasila</label>
                                        <div class="invalid-feedback">Nilai harus diisi (0-100)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="reset" class="btn btn-light btn-lg px-5">
                                <i class="fas fa-undo me-2"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Card -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                                <i class="fas fa-info-circle text-info fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-1">Petunjuk Pengisian</h5>
                            <p class="text-muted mb-0">Pastikan semua field terisi dengan benar sebelum menyimpan data. ID Siswa harus unik dan tidak boleh sama dengan data yang sudah ada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Form validation
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Number input validation
    const numberInputs = document.querySelectorAll('input[type="number"]')
    numberInputs.forEach(input => {
        input.addEventListener('input', (e) => {
            let value = parseInt(e.target.value)
            if (value < 0) e.target.value = 0
            if (value > 100) e.target.value = 100
        })
    })
</script>
@endsection