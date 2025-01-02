<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function daftarEvent(Request $request, $eventId)
    {
        $user = Users::find(auth()->id()); // Ambil data pengguna yang sedang login

        if ($user) {
            $event = Events::find($eventId); // Ambil event berdasarkan eventId

            if ($user->events->contains($eventId)) {
                // Jika pengguna sudah terdaftar di event ini
                return redirect()->back()->with('warning', 'Anda sudah terdaftar di event ini.');
            } else {
                // Jika pengguna belum terdaftar di event ini, tambahkan pendaftaran
                $user->events()->attach($event); 
                return redirect()->back()->with('success', 'Berhasil mendaftar event!');
            }
        }
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tanggalLahir' => 'required|date|before_or_equal:' . now()->toDateString(),
        ]);

        $user = Auth::user();
        $updateStatus = $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'tanggalLahir' => $request->input('tanggalLahir'),
        ]);

        if ($updateStatus) {
            return redirect()->back()->with('success', 'Update profile berhasil.');
        } else {
            return redirect()->back()->with('error', 'Update profile gagal.');
        }
    }
}
