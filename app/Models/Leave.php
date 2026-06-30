<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_mulai', // 'izin' atau 'sakit'
        'tanggal_selesai', // 'izin' atau 'sakit'
        'jenis', // 'izin', 'sakit', atau 'dinas_luar' 
        'keterangan',
        'surat_dokumen', // Nama file surat izin/sakit yang diupload
        'status', // 'pending', 'disetujui', 'ditolak'
    ];

    // Relasi dengan User (Guru)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
