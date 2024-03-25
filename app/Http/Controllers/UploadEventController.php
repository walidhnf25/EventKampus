<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class UploadEventController extends Controller
{
    //

        // Menyimpan data event sesuai inputan form
    public function store(Request $request){
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
        $event->save();
        return redirect('Events')->with('msg', 'Tambah berhasil');
    }
}
