<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class ListEventController extends Controller
{
    //
    // Menampilkan list pada table halaman Events
    public function index(){
        $userId = Auth::id();
        $event = Events::where('user_id', $userId)->get();
        return view('listEvent', ['list' => $event]);
    }
}
