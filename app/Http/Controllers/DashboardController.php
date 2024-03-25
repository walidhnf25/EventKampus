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
        $event = Events::get();
        return view('dashboard', ['list' => $event, 'user' => $user]);
    }
}
