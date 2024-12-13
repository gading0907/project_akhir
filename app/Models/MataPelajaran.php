<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataPelajaran extends Model
{
    use HasFactory;
    
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'mata_pelajaran_id';
    
    protected $fillable = [
        'mata_pelajaran'
    ];

    /**
     * Get the soal for the mata pelajaran.
     */
    public function soal()
    {
        return $this->hasMany(Soal::class, 'mata_pelajaran_id', 'mata_pelajaran_id'); // Pastikan kolom benar
    }

}