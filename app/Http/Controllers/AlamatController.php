<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Users;

class AlamatController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $events = Events::where('user_id', $userId)->get();
            return view('alamat', compact('events'));
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->route('login'); // You can customize this based on your application's logic
        } 
    }
}
