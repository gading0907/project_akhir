@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4 bg-light">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-gradient-primary border-0 rounded-3 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="text-white mb-2 fw-bold">Daftar Siswa</h2>
                            <p class="text-white-50 mb-0">Kelola dan monitor perkembangan akademik siswa dengan mudah</p>
                        </div>
                        <!-- <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                            <a href="{{ route('siswa.create') }}" class="btn btn-light btn-lg px-4 shadow-sm">
                                <i class="fas fa-plus-circle me-2"></i>Tambah Siswa
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-users text-primary fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Total Siswa</h6>
                                    <h3 class="mb-0">{{ count($siswa) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-chart-line text-success fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Rata-rata Nilai Sekolah</h6>
                                    <h3 class="mb-0">{{ number_format($siswa->avg('nilai_rata_rata'), 1) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-graduation-cap text-info fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Total Jurusan</h6>
                                    <h3 class="mb-0">{{ $siswa->unique('jurusan')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-star text-warning fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Nilai Tertinggi</h6>
                                    <h3 class="mb-0">{{ number_format($siswa->max('nilai_rata_rata'), 1) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-lg mb-4">
                <div class="card-body bg-light">
                    <form method="GET" action="{{ route('siswa.index') }}" class="row g-4">
                        <div class="col-md-4">
                            <label for="jurusan" class="form-label text-secondary fw-bold">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-select form-select-lg">
                                <option value="">Semua Jurusan</option>
                                @foreach(['TJKT', 'PLPG', 'BC', 'ANIMASI', 'TO', 'TL', 'TE', 'AKL', 'GEOSPASIAL'] as $jurusan)
                                    <option value="{{ $jurusan }}" {{ request('jurusan') == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kelas" class="form-label text-secondary fw-bold">Kelas</label>
                            <select name="kelas" id="kelas" class="form-select form-select-lg">
                                <option value="">Semua Kelas</option>
                                @for ($i = 10; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ request('kelas') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="d-flex w-100 gap-3">
                                <button type="submit" class="btn btn-primary btn-lg w-50">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary btn-lg w-50">
                                    <i class="fas fa-redo me-2"></i>Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Data Siswa</h5>
                        </div>
                        <div class="col-auto">
                            <form action="{{ route('admin.siswa.index') }}" method="GET">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" name="search" class="form-control border-0 bg-light" placeholder="Cari siswa..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="dataTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">ID Siswa</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Nama Siswa</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Kelas</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Jurusan</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Email</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Nilai B.Indo</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Nilai Info</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Nilai PPKn</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Rata-rata</th>
                                    <th class="px-4 py-3 text-uppercase small fw-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                @foreach($siswa as $data)
                                <tr>
                                    <td class="px-4 py-3 fw-bold text-muted">{{ $data->id_siswa }}</td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3 bg-primary bg-opacity-10 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                                                <span class="avatar-text text-primary fw-bold" style="font-size: 18px;">
                                                    {{ strtoupper(substr($data->nama_siswa, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-semibold">{{ $data->nama_siswa }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">
                                            {{ $data->kelas }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                                            {{ $data->jurusan }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-muted">{{ $data->email }}</td>
                                    <td class="px-4 py-3">
                                        <div class="text-center">
                                            <span class="small fw-semibold d-block mb-1">{{ $data->nilai_bahasa_indonesia }}</span>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success rounded-pill" 
                                                    style="width: {{ $data->nilai_bahasa_indonesia }}%;">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-center">
                                            <span class="small fw-semibold d-block mb-1">{{ $data->nilai_informatika }}</span>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-primary rounded-pill" 
                                                    style="width: {{ $data->nilai_informatika }}%;">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-center">
                                            <span class="small fw-semibold d-block mb-1">{{ $data->nilai_pendidikan_pancasila }}</span>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-warning rounded-pill" 
                                                    style="width: {{ $data->nilai_pendidikan_pancasila }}%;">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if (is_null($data->nilai_rata_rata))
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold">
                                                Belum Selesai
                                            </span>
                                        @else
                                            @php
                                                $warnaBadge = $data->nilai_rata_rata < 70 ? 'bg-danger' : 'bg-success';
                                            @endphp
                                            <span class="badge {{ $warnaBadge }} px-3 py-2 rounded-pill fw-semibold">
                                                {{ $data->nilai_rata_rata }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm rounded-circle shadow-sm" type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center py-2" 
                                                        href="{{ route('siswa.edit', $data->id_siswa) }}">
                                                        <i class="fas fa-edit text-warning me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center py-2 text-danger" 
                                                        href="#" data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal{{ $data->id_siswa }}">
                                                        <i class="fas fa-trash me-2"></i>Hapus
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteModal{{ $data->id_siswa }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4 border-0 shadow">
                                            <div class="modal-header border-0 pb-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-4">
                                                <div class="mx-auto mb-4">
                                                    <div class="bg-danger bg-opacity-10 rounded-circle p-4 d-inline-block">
                                                        <i class="fas fa-exclamation-circle text-danger fs-1"></i>
                                                    </div>
                                                </div>
                                                <h4 class="mb-3 fw-bold">Konfirmasi Penghapusan</h4>
                                                <div class="alert alert-warning bg-warning bg-opacity-10 border-0 mb-4">
                                                    <p class="text-muted mb-2">Anda akan menghapus data siswa:</p>
                                                    <h5 class="text-dark mb-0 fw-bold">{{ $data->nama_siswa }}</h5>
                                                </div>
                                                <p class="text-muted small mb-4">
                                                    Tindakan ini tidak dapat dibatalkan dan semua data terkait akan dihapus secara permanen.
                                                </p>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <button type="button" class="btn btn-light rounded-pill px-4 py-2" data-bs-dismiss="modal">
                                                        <i class="fas fa-times me-2"></i>
                                                        Batal
                                                    </button>
                                                    <form action="{{ route('siswa.destroy', $data->id_siswa) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger rounded-pill px-4 py-2">
                                                            <i class="fas fa-trash-alt me-2"></i>
                                                            Hapus Data
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection