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
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'tanggalLahir' => 'required|date|before_or_equal:today',
            'noHP' => 'required|string|max:13',
            'password' => 'required|string|min:8',
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['tanggalLahir'] = $request->tanggalLahir;
        $data['noHP'] = $request->noHP;
        $data['password'] = Hash::make($request->password);

        if (Users::create($data)) {
            $request->session()->flash('success', 'Registrasi Berhasil');
            return redirect('Login');
        } else {
            $request->session()->flash('error', 'Registrasi Gagal, coba lagi.');
            return redirect()->back();
        }
    }
}
