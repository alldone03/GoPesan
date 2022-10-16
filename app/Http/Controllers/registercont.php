<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registercont extends Controller
{
    public function index()
    {
        return view('pages.register');
    }
    public function register()
    {
        // dd(request()->all());
        $validate = request()->validate([
            'nama' => 'required',
            'username' => 'required|unique:users|min:10|numeric',
            'password' => ['required', 'min:5']
        ], [
            'required' => 'Perlu diisi !!!',
            'unique' => 'NRP Sudah Ada !!!',
            'numeric' => 'Harus angka !!!',
            'password.min' => 'Minimal 5 Karakter !!!',
        ]);
        $data = User::create(request()->all());
        $data->password = bcrypt(request()->password);
        $data->save();
        return redirect('/login');
    }
}