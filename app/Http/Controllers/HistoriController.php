<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{
    //
    public function getEventData()
    {
        $user = Auth::user();
        $events =Events::where('user_id', $user)->get();
        return view('histori', compact('events'));
    }
}
