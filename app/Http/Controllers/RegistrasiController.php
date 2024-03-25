<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index(){
        return view('index', [
            'title' => 'Registrasi',
            'active' => 'registrasi'
        ]);
    }
    public function store(Request $request){
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['tanggalLahir'] = $request->tanggalLahir;
        $data['noHP'] = $request->noHP;
        $data['password'] = Hash::make($request->password);

        Users::create($data);
        $request->session()->flash('success', 'Registrasi Berhasil');
        return redirect('Login');
    }
}
