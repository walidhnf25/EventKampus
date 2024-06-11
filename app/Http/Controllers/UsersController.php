<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function daftarEvent(Request $request, $eventId)
    {
        $user = Users::find(auth()->id()); // Mengambil data pengguna yang sudah login, sesuai dengan kasus Anda

        if ($user) {
            $event = Events::find($eventId); // Mengambil event yang ingin diikuti

            if ($event) {
                $user->events()->attach($event); // Menambahkan pengguna ke dalam event
                return redirect()->back()->with('success', 'Berhasil mendaftar event!');
            }
        }

        return redirect()->back()->with('error', 'Gagal mendaftar event.');
    }
}
