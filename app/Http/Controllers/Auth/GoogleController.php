<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah email ini sudah terdaftar sebelumnya
            $user = User::where('email', $googleUser->email)->first();

            if($user){
                // Jika sudah ada, update google_id (untuk jaga-jaga) dan langsung login
                $user->update([
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar
                ]);
                Auth::login($user);
                return redirect()->intended('dashboard');
            } else {
                // Jika belum ada, BUAT AKUN BARU otomatis (Daftar via Google)
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id'=> $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => Hash::make(uniqid()), // Password acak karena loginnya pakai Google
                    'role' => 'guru', // Otomatis jadi guru!
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            // Jika batal atau error, kembalikan ke halaman login
            return redirect('/login')->with('error', 'Gagal login dengan Google.');
        }
    }
}