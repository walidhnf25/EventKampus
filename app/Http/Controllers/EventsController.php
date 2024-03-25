<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\File;
class EventsController extends Controller
{
    //
    // Menampilkan list pada table halaman Events
    public function index(){
        $event = Events::get();
        return view('listEvent', ['list' => $event]);
    }

    // Menyimpan data event sesuai inputan form
    public function store(Request $request){
        $image = $request->file('fotoEvent');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);

        $event = new Events;
        $event->namaEvent = $request->namaEvent;
        $event->fotoEvent = $imageName;
        $event->tanggalMulai = $request->tanggalMulai;
        $event->tanggalAkhir = $request->tanggalAkhir;
        $event->harga = $request->harga;
        $event->deskripsi = $request->deskripsi;
        $event->save();
        return redirect('Events')->with('msg', 'Tambah berhasil');
    }
    
    public function update(Request $request, $idEvent) {
        
        $event = Events::find($idEvent);
        if ($request->hasFile('fotoEvent')) {
            $image = $request->file('fotoEvent');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);

            $filePath = public_path('uploads/' . $event->fotoEvent);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        $event->namaEvent = $request->namaEvent;
        $event->fotoEvent = $imageName;
        $event->tanggalMulai = $request->tanggalMulai;
        $event->tanggalAkhir = $request->tanggalAkhir;
        $event->harga = $request->harga;
        $event->deskripsi = $request->deskripsi;
        $event->save();
        return redirect('Events')->with('msg', 'Edit berhasil');
    }

    public function showUpdate($idEvent){
        $Event = Events::find($idEvent);
        return view('EditEvent', ['e' => $Event]);
    }

    public function destroy($idEvent){
        $event = Events::find($idEvent);
        $filePath = public_path('uploads/' . $event->fotoEvent);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        Events::destroy($idEvent);
        return redirect('Events')->with('msg', 'Delete berhasil');
    }

    public function search(Request $request)
    {
    $search = $request->input('search'); // Ambil inputan pencarian dari form

    // Lakukan pencarian berdasarkan namaEvent atau deskripsi event
    $events = Events::where('namaEvent', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%")
                    ->get();

    return view('search')->with('events', $events); // Mengembalikan view search.blade.php dengan data events
    }
}
