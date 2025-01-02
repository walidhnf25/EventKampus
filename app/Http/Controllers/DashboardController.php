<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Events;
class DashboardController extends Controller
{
    //
    // Menampilkan list pada table halaman Events
    
    public function index(){
        $user = Auth::user();
        $events = Events::get();
        $list = $events;
        return view('dashboard', compact('list', 'events', 'user'));
    }
}
