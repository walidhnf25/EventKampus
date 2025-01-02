<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class UploadEventController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'namaEvent' => 'required|string|max:255',
            'fotoEvent' => 'required|mimes:jpg,jpeg,png',
            'tanggalMulai' => 'required|date|after:' . now()->toDateString(),
            'tanggalAkhir' => 'required|date|after:' . now()->toDateString(),
            'harga' => 'required|numeric|min:0|max:30000',
            'deskripsi' => 'required|string',
        ]);

        $image = $request->file('fotoEvent');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);
        $user_id= Auth::id();

        $event = new Events;
        $event->namaEvent = $request->namaEvent;
        $event->fotoEvent = $imageName;
        $event->tanggalMulai = $request->tanggalMulai;
        $event->tanggalAkhir = $request->tanggalAkhir;
        $event->harga = $request->harga;
        $event->deskripsi = $request->deskripsi;
        $event->user_id = $user_id;

        if ($event->save()) {
            return redirect('Events')->with('success', 'Upload event berhasil');
        } else {
            return redirect('Events')->with('error', 'Upload event gagal');
        }
    }
}
