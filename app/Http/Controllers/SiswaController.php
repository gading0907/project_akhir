<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini
use Illuminate\Support\Facades\Log; // Untuk log error
use Illuminate\Support\Facades\Hash; // Jika ada proses hashing password

class SiswaController extends Controller
{
    // Menampilkan dashboard siswa
    public function dashboard()
    {
        // Check if user is logged in
        if (!session()->has('id_siswa')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Get logged in student data
        $siswa = Siswa::find(session('id_siswa'));
        if (!$siswa) {
            session()->flush();
            return redirect()->route('login')->with('error', 'Data siswa tidak ditemukan.');
        }

        // Get subjects with question count
        $mataPelajaran = MataPelajaran::withCount('soal')->get();

        return view('siswa.dashboard', compact('mataPelajaran', 'siswa'));
    }

    public function showSoal($mata_pelajaran_id)
    {
        if (!session()->has('id_siswa')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $mataPelajaran = MataPelajaran::findOrFail($mata_pelajaran_id);
        $soal = Soal::where('mata_pelajaran_id', $mata_pelajaran_id)->get();
        $siswa = Siswa::find(session('id_siswa'));

        return view('siswa.show_soal', compact('mataPelajaran', 'soal', 'siswa'));
    }

    public function submitSoal(Request $request, $mata_pelajaran_id)
    {
        if (!session()->has('id_siswa')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        try {
            $siswa = Siswa::find(session('id_siswa'));
            $mataPelajaran = MataPelajaran::findOrFail($mata_pelajaran_id);
            $soal = Soal::where('mata_pelajaran_id', $mata_pelajaran_id)->get();
    
            $totalSoal = $soal->count();
            $jawabanBenar = 0;
    
            if ($totalSoal === 0) {
                return redirect()->route('siswa.dashboard')->with('error', 'Tidak ada soal untuk mata pelajaran ini.');
            }
    
            foreach ($soal as $item) {
                if (isset($request->jawaban[$item->id]) &&
                    strtoupper($request->jawaban[$item->id]) === strtoupper($item->kunci_jawaban)) {
                    $jawabanBenar++;
                }
            }
    
            $nilai = $jawabanBenar > 0 ? ($jawabanBenar / $totalSoal) * 100 : 0;
    
            // Simpan nilai untuk mata pelajaran yang dijawab
            switch ($mataPelajaran->mata_pelajaran) {
                case 'Bahasa Indonesia':
                    $siswa->nilai_bahasa_indonesia = $nilai;
                    break;
                case 'Informatika':
                    $siswa->nilai_informatika = $nilai;
                    break;
                case 'Pendidikan Pancasila':
                    $siswa->nilai_pendidikan_pancasila = $nilai;
                    break;
            }
    
            $siswa->save();
    
            // Hitung rata-rata otomatis jika tiga nilai telah diisi
            if ($siswa->nilai_bahasa_indonesia !== null && 
                $siswa->nilai_informatika !== null && 
                $siswa->nilai_pendidikan_pancasila !== null) {
    
                $nilaiRataRata = (
                    $siswa->nilai_bahasa_indonesia +
                    $siswa->nilai_informatika +
                    $siswa->nilai_pendidikan_pancasila
                ) / 3;
    
                $siswa->nilai_rata_rata = $nilaiRataRata;
                $siswa->save();
            }
    
            return view('siswa.nilai', compact('nilai', 'mataPelajaran', 'siswa'));
        } catch (\Exception $e) {
            Log::error('Error submitting answers: ' . $e->getMessage());
            return redirect()->route('siswa.dashboard')
                ->with('error', 'Terjadi kesalahan saat menyimpan nilai.');
        }
    }
    

    // Menampilkan daftar siswa
public function index(Request $request)
{
    // Query dasar untuk siswa
    $query = Siswa::query();

    // Filter berdasarkan pencarian nama siswa
    if ($request->filled('search')) {
        $query->where('nama_siswa', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan jurusan
    if ($request->filled('jurusan')) {
        $query->where('jurusan', $request->jurusan);
    }

    // Filter berdasarkan kelas
    if ($request->filled('kelas')) {
        $query->where('kelas', $request->kelas);
    }

    // Ambil data siswa sesuai filter (atau semua jika tidak ada filter)
    $siswa = $query->paginate(10);

    // Kirim data siswa dan nilai filter ke view
    return view('admin.index_siswa', compact('siswa'));
}

    
    // Menampilkan form untuk menambah siswa
    public function create()
    {
        return view('admin.create_siswa');
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'nilai_bahasa_indonesia' => 'required|numeric|min:0|max:100',
            'nilai_informatika' => 'required|numeric|min:0|max:100',
            'nilai_pendidikan_pancasila' => 'required|numeric|min:0|max:100',
        ]);

        $nilaiRataRata = (
            $request->nilai_bahasa_indonesia +
            $request->nilai_informatika +
            $request->nilai_pendidikan_pancasila
        ) / 3;

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'nilai_bahasa_indonesia' => $request->nilai_bahasa_indonesia,
            'nilai_informatika' => $request->nilai_informatika,
            'nilai_pendidikan_pancasila' => $request->nilai_pendidikan_pancasila,
            'nilai_rata_rata' => $nilaiRataRata,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data siswa
    public function edit($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        return view('admin.edit_siswa', compact('siswa'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $id_siswa)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,' . $id_siswa . ',id_siswa',
            'nilai_bahasa_indonesia' => 'required|numeric|min:0|max:100',
            'nilai_informatika' => 'required|numeric|min:0|max:100',
            'nilai_pendidikan_pancasila' => 'required|numeric|min:0|max:100',
        ]);

        $nilaiRataRata = (
            $request->nilai_bahasa_indonesia +
            $request->nilai_informatika +
            $request->nilai_pendidikan_pancasila
        ) / 3;

        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'nilai_bahasa_indonesia' => $request->nilai_bahasa_indonesia,
            'nilai_informatika' => $request->nilai_informatika,
            'nilai_pendidikan_pancasila' => $request->nilai_pendidikan_pancasila,
            'nilai_rata_rata' => $nilaiRataRata,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    // Menghapus data siswa
    public function destroy($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
