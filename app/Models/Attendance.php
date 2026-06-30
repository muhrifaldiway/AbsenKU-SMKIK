<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // INI YANG HARUS DIPERBARUI
    protected $fillable = [
        'user_id',
        'date',
        'time_in',
        'lat_in',
        'long_in',
        'photo_in',
        'status',
        
        // Tambahkan 4 baris di bawah ini agar diizinkan masuk ke database:
        'time_out',
        'lat_out',
        'long_out',
        'photo_out'
    ];

    // Relasi ke tabel user (Biarkan seperti yang sudah ada di file Anda)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}