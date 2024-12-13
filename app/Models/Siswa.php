<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa'; // Menentukan primary key
    public $incrementing = false; // Jika id_siswa bukan auto-increment
    protected $keyType = 'string'; // Ubah ke 'int' jika id_siswa berupa angka

    protected $fillable = [
        'id_siswa',
        'nama_siswa',
        'kelas',
        'jurusan',
        'email',
        'password',
        'nilai_bahasa_indonesia',
        'nilai_informatika',
        'nilai_pendidikan_pancasila',
    ];
    

    protected $hidden = [
        'password',
    ];
}
