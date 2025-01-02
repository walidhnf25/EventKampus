<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Review;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function showEvents()
    {
        $events = Events::all();

        return view('Review', compact('events'));
    }

    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|integer|min:1|max:5', // Validasi rating (1-5)
        ]);

        $event = Events::find($id);

        if ($event) {
            $review = Review::create([
                'event_id' => $event->idEvent,
                'user_id' => auth()->id(), // Pastikan pengguna sudah login
                'review' => $request->input('review'), // Nilai rating (1-5)
            ]);

            if ($review) {
                return redirect()->back()->with('success', 'Review berhasil dikirim!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengirim review. Silakan coba lagi.');
            }
        }

        return redirect()->back()->with('error', 'Gagal mengirim review. Silakan coba lagi.');
    }
}
