<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Menampilkan halaman login siswa
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menampilkan halaman registrasi siswa
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses login siswa
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        try {
            $siswa = Siswa::where('email', $request->email)->first();
    
            if ($siswa && Hash::check($request->password, $siswa->password)) {
                Auth::login($siswa);
    
                session([
                    'id_siswa' => $siswa->id_siswa,
                    'nama_siswa' => $siswa->nama_siswa,
                    'kelas' => $siswa->kelas,
                    'jurusan' => $siswa->jurusan
                ]);
    
                return redirect()->route('siswa.dashboard')->with('success', 'Login berhasil. Selamat datang!');
            }
    
            return back()->with('error', 'Email atau password salah.');
        } catch (\Exception $e) {
            Log::error('Login Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat login.');
        }
    }
    

    // Menampilkan halaman dashboard siswa
    public function dashboard()
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Ambil data siswa yang sedang login
        $siswa = Auth::user();
        
        // Ambil mata pelajaran
        $mataPelajaran = MataPelajaran::withCount('soal')->get();
        
        // Pass data siswa ke view
        return view('siswa.dashboard', compact('mataPelajaran', 'siswa'));
    }

    // Proses logout siswa
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }

    // Proses registrasi siswa
    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:2',
            // 'password' => 'required|string|min:2|confirmed',
        ]);

        // Membuat data siswa baru
        try {
            Siswa::create([
                'nama_siswa' => $request->nama_siswa,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login')->with('success', 'Registrasi berhasil, silahkan login.');
        } catch (\Exception $e) {
            // Log error jika terjadi kesalahan
            Log::error('Gagal Registrasi: ', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Registrasi gagal, silakan coba lagi.']);
        }
    }

    // Menampilkan halaman login admin
    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    // Proses login admin
    public function adminLogin(Request $request)
    {
        // Validasi input login admin
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Verifikasi login admin
        if ($request->name === 'admin' && $request->password === 'admin123') {
            // Simpan sesi admin
            Auth::guard('admin')->loginUsingId(1); // Buat guard admin untuk otentikasi admin
            return redirect()->route('admin.dashboard');
        }

        // Jika login admin gagal
        return back()->withErrors(['name' => 'Nama atau password admin salah.']);
    }

    // Proses logout admin
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Admin berhasil logout.');
    }
}
