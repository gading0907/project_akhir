<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    // Menampilkan daftar soal
    public function index(Request $request)
    {
        $mataPelajaran_id = $request->input('mata_pelajaran_id');
    
        // Mengubah join untuk menggunakan mata_pelajaran_id
        $soal = Soal::join('mata_pelajaran', 'mata_pelajaran.mata_pelajaran_id', '=', 'soal.mata_pelajaran_id')
            ->when($mataPelajaran_id, function ($query, $mataPelajaran_id) {
                return $query->where('soal.mata_pelajaran_id', $mataPelajaran_id);
            })
            ->get();
    
        $soal2 = MataPelajaran::all();
    
        // Hitung jumlah soal per mata pelajaran
        $jumlahSoal = Soal::where('mata_pelajaran_id', $mataPelajaran_id)->count();
    
        return view('soal.index', compact('soal', 'soal2', 'jumlahSoal', 'mataPelajaran_id'));
    }
    
    // Menampilkan form untuk membuat soal baru
    public function create(Request $request)
    {
        $mataPelajaran_id = $request->input('mata_pelajaran_id');
        return view('soal.create', compact('mataPelajaran_id'));
    }
    
    // Menyimpan soal baru ke database
    public function store(Request $request)
    {
        // Pastikan mata_pelajaran_id diterima dengan benar
        $mata_pelajaran_id = $request->mata_pelajaran_id ?? 0;

        // Menyimpan data soal ke dalam database
        Soal::create([
            'soal' => trim($request->soal),
            'mata_pelajaran_id' => $mata_pelajaran_id,
            'soal_a' => trim($request->soal_a),
            'soal_b' => trim($request->soal_b),
            'soal_c' => trim($request->soal_c),
            'soal_d' => trim($request->soal_d),
            'kunci_jawaban' => trim($request->kunci_jawaban),
        ]);

        return redirect()->route('soal.index')->with('success', 'Soal berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit soal
    public function edit($id)
    {
        // Ambil data soal berdasarkan ID beserta relasi mata pelajaran
        $soal = Soal::with('mataPelajaran')->findOrFail($id);
        $mataPelajaran_id = $soal->mata_pelajaran_id;
    
        return view('soal.edit', compact('soal', 'mataPelajaran_id'));
    }
    
    // Memperbarui soal di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'soal' => 'required|string|max:255',
            'soal_a' => 'required|string|max:255',
            'soal_b' => 'required|string|max:255',
            'soal_c' => 'required|string|max:255',
            'soal_d' => 'required|string|max:255',
            'kunci_jawaban' => 'required|string|max:1|in:A,B,C,D',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,mata_pelajaran_id', // Perbaikan validasi
        ]);

        $soal = Soal::findOrFail($id);
        $soal->update([
            'soal' => trim($request->soal),
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'soal_a' => trim($request->soal_a),
            'soal_b' => trim($request->soal_b),
            'soal_c' => trim($request->soal_c),
            'soal_d' => trim($request->soal_d),
            'kunci_jawaban' => trim($request->kunci_jawaban),
        ]);

        return redirect()->route('soal.index')->with('success', 'Soal berhasil diperbarui');
    }

    // Menghapus soal dari database
    public function destroy($id)
    {
        // Mencari soal berdasarkan ID dan menghapusnya
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->route('soal.index')->with('success', 'Soal berhasil dihapus');
    }
}
