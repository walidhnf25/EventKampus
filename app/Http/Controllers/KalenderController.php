<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Events;
class KalenderController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('kalender', ['user' => $user]);
    }
}
