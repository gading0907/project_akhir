@extends('layouts.admin')

@section('content')
<div class="container-fluid py-6">
    <div class="card shadow-xl border-0 rounded-4 overflow-hidden">
        <!-- Elegant Header Section -->
        <div class="card-header bg-gradient-to-r from-primary-50 to-white border-0 py-4">
            <div class="row align-items-center px-4">
                <div class="col-auto">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                        <i class="fas fa-book-reader text-primary fa-lg"></i>
                    </div>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-gray-800 mb-0">Bank Soal</h3>
                    <p class="text-gray-600 mb-0">Manajemen Soal Pembelajaran</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('soal.create', ['mata_pelajaran_id' => request('mata_pelajaran_id')]) }}" 
                       class="btn btn-primary btn-lg px-4 rounded-3 shadow-sm hover:shadow-lg transition-all">
                        <i class="fas fa-plus-circle me-2"></i>
                        <span>Tambah Soal Baru</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body p-5">
            <!-- Enhanced Alerts -->
            @if (session('success'))
                <div class="alert alert-success border-0 rounded-3 shadow-sm fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="alert-icon rounded-circle bg-success bg-opacity-10 p-2 me-3">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div>
                            <h6 class="alert-heading mb-1">Berhasil!</h6>
                            <span class="text-success">{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- @if ($jumlahSoal < 10)
                <div class="alert alert-warning border-0 rounded-3 shadow-sm fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="alert-icon rounded-circle bg-warning bg-opacity-10 p-2 me-3">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        </div>
                        <div>
                            <h6 class="alert-heading mb-1">Perhatian!</h6>
                            <span class="text-warning">
                                Minimal dibutuhkan 10 soal. Saat ini tersedia {{ $jumlahSoal }} soal.
                                <a href="{{ route('soal.create') }}" class="text-warning text-decoration-underline">
                                    Tambah soal sekarang
                                </a>
                            </span>
                        </div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif -->

            <!-- Enhanced Filter Section -->
            <div class="mb-5">
                <div class="d-flex flex-wrap gap-2" role="group" aria-label="Filter Mata Pelajaran">
                    <a href="{{ route('soal.index') }}" 
                       class="btn {{ !request('mata_pelajaran_id') ? 'btn-primary shadow' : 'btn-outline-secondary' }} 
                              rounded-pill px-4 py-2 hover:shadow-lg transition-all">
                        <i class="fas fa-globe-asia me-2"></i>Semua Mata Pelajaran
                    </a>
                    @foreach ($soal2 as $item)
                        <a href="{{ route('soal.index', ['mata_pelajaran_id' => $item->mata_pelajaran_id]) }}"
                           class="btn {{ request('mata_pelajaran_id') == $item->mata_pelajaran_id 
                                      ? 'btn-primary shadow' 
                                      : 'btn-outline-secondary' }} 
                                  rounded-pill px-4 py-2 hover:shadow-lg transition-all">
                            <i class="fas fa-book me-2"></i>{{ $item->mata_pelajaran }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Enhanced Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="dataSoal">
                    <thead>
                        <tr class="bg-light">
                            <th class="text-center rounded-start-3 py-3" width="5%">No.</th>
                            <th class="py-3" width="15%">Mata Pelajaran</th>
                            <th class="py-3" width="25%">Soal</th>
                            <th class="py-3" width="10%">A</th>
                            <th class="py-3" width="10%">B</th>
                            <th class="py-3" width="10%">C</th>
                            <th class="py-3" width="10%">D</th>
                            <th class="text-center py-3" width="7%">Kunci</th>
                            <th class="text-center rounded-end-3 py-3" width="8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($soal as $index => $item)
                            <tr class="hover:bg-light-100 transition-colors">
                                <td class="text-center">
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                                        {{ $index + 1 }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">
                                        {{ $item->mata_pelajaran }}
                                    </span>
                                </td>
                                <td>
                                    <p class="text-gray-700 mb-0 text-wrap" style="max-width: 300px;">
                                        {{ $item->soal }}
                                    </p>
                                </td>
                                <td class="text-gray-600">{{ $item->soal_a }}</td>
                                <td class="text-gray-600">{{ $item->soal_b }}</td>
                                <td class="text-gray-600">{{ $item->soal_c }}</td>
                                <td class="text-gray-600">{{ $item->soal_d }}</td>
                                <td class="text-center">
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                        {{ strtoupper($item->kunci_jawaban) }}
                                    </span>
                                </td>
                                <td>
    <div class="d-flex gap-2 justify-content-center align-items-center">
        <a href="{{ route('soal.edit', $item->id) }}" 
           class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center shadow-hover"
           style="width: 40px; height: 40px;"
           data-bs-toggle="tooltip" 
           title="Edit Soal">
            <i class="fas fa-edit text-warning"></i>
        </a>
        <form action="{{ route('soal.destroy', $item->id) }}" 
              method="POST" 
              class="d-inline delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center shadow-hover"
                    style="width: 40px; height: 40px;"
                    data-bs-toggle="tooltip" 
                    title="Hapus Soal">
                <i class="fas fa-trash-alt text-danger"></i>
            </button>
        </form>
    </div>
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox fa-3x text-gray-400 mb-3"></i>
                                        <h6 class="text-gray-500">Belum ada data soal tersedia</h6>
                                        <p class="text-gray-400 mb-0">Mulai dengan menambahkan soal baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .shadow-hover { transition: all 0.2s ease-in-out; }
    .shadow-hover:hover { transform: translateY(-2px); box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); }
    .empty-state { animation: fadeIn 0.5s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Enhanced DataTable Configuration
    const table = $('#dataSoal').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
        },
        responsive: true,
        pageLength: 10,
        dom: '<"row align-items-center mb-4"<"col-md-6"l><"col-md-6"f>>rtip',
        order: [[0, 'asc']],
        columnDefs: [
            {
                targets: [0, -1],
                orderable: false
            }
        ],
        drawCallback: function() {
            $('.dataTables_paginate .pagination').addClass('pagination-sm');
            $('.dataTables_length select').addClass('form-select form-select-sm');
            $('.dataTables_filter input').addClass('form-control form-control-sm');
        }
    });

    // Initialize Tooltips
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(tooltip => new bootstrap.Tooltip(tooltip));

    // Enhanced Delete Confirmation
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: 'Apakah Anda yakin ingin menghapus soal ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endpush
@endsection