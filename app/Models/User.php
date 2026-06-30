<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

// Tambahkan 'google_id', 'avatar', dan 'role' ke dalam Fillable
#[Fillable(['name', 'email', 'password', 'google_id', 'avatar', 'role', 'foto'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Helper untuk mengecek apakah user adalah Admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Helper untuk mengecek apakah user adalah Guru
     */
    public function isGuru()
    {
        return $this->role === 'guru';
    }
}