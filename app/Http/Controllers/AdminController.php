<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Siswa;
use App\Models\MataPelajaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Data statistik
        $jumlahSoal = Soal::count();
        $jumlahSiswa = Siswa::count();
        $jumlahMataPelajaran = MataPelajaran::count();
    
        // Aktivitas terbaru
        $recentActivities = collect([
            [
                'description' => 'Soal Matematika ditambahkan',
                'type' => 'soal',
                'created_at' => now()->subHours(2),
            ],
            [
                'description' => 'Siswa baru terdaftar',
                'type' => 'siswa',
                'created_at' => now()->subHours(5),
            ],
        ]);
    
        return view('admin.dashboard', compact('jumlahSoal', 'jumlahSiswa', 'jumlahMataPelajaran', 'recentActivities'));
    }
}
