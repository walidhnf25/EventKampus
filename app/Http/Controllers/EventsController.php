<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Users;
use Illuminate\Support\Facades\File;
class EventsController extends Controller
{
    public function index(){
        $event = Events::get();
        return view('listEvent', ['list' => $event]);
    }

    public function showEvent($id)
    {
        $event = Events::find($id);
        if ($event) {
            return view('Event', compact('event'));
        } else {
            abort(404);
        }
    }

    public function daftarEvent(Request $request, $eventId)
    {
        $user = Users::find(auth()->id()); 

        if ($user) {
            $event = Events::find($eventId); 

            if ($event) {
                if ($user->events->contains($eventId)) {
                    return redirect()->back()->with('warning', 'Anda sudah terdaftar di event ini.');
                }
                $user->events()->attach($event); 
                return redirect()->back()->with('success', 'Berhasil mendaftar event!');
            } else {
                return redirect()->back()->with('error', 'Event tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan. Silakan login terlebih dahulu.');
        }
    }
    
    public function update(Request $request, $idEvent)
    {
        $request->validate([
            'namaEvent' => 'required|string|max:255',
            'fotoEvent' => 'nullable|mimes:jpg,jpeg,png',
            'tanggalMulai' => 'required|date|after:' . now()->toDateString(),
            'tanggalAkhir' => 'required|date|after:' . now()->toDateString(),
            'harga' => 'required|numeric|min:0|max:30000',
            'deskripsi' => 'required|string',
        ]);

        $event = Events::find($idEvent);

        if ($request->hasFile('fotoEvent')) {
            $image = $request->file('fotoEvent');
            $imageName = time() . '.' . $image->extension();
            
            $image->move(public_path('uploads'), $imageName);

            $filePath = public_path('uploads/' . $event->fotoEvent);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            $event->fotoEvent = $imageName;
        }

        $event->namaEvent = $request->namaEvent;
        $event->tanggalMulai = $request->tanggalMulai;
        $event->tanggalAkhir = $request->tanggalAkhir;
        $event->harga = $request->harga;
        $event->deskripsi = $request->deskripsi;

        if ($event->save()) {
            return redirect('Events')->with('success', 'Edit event berhasil');
        } else {
            return redirect('Events')->with('error', 'Edit event gagal');
        }
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
        $search = $request->input('search');

        if (empty($search)) {
            return view('search')->with('events', []);
        }

        $words = explode(' ', $search);

        $words = array_slice($words, 0, 10);

        $search = implode(' ', $words);

        $events = Events::where('namaEvent', 'like', "%$search%")
            ->orWhere('deskripsi', 'like', "%$search%")
            ->get();

        return view('search')->with('events', $events);
    }
}
