<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory;
    
    protected $table = 'soal';
    
    protected $fillable = [
        'mata_pelajaran_id',
        'soal',
        'soal_a',
        'soal_b',
        'soal_c',
        'soal_d',
        'kunci_jawaban'
    ];

    /**
     * Get the mata pelajaran that owns the soal.
     */
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id', 'mata_pelajaran_id');
    }
    
}