<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\ConsoleInput;

class logincont extends Controller
{
    public function index()
    {

        return view('pages.login');
    }
    public function login()
    {
        $validate = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'required' => 'Perlu diisi!!!',
        ]);


        // dd($validate);

        if (Auth::attempt($validate)) {
            request()->session()->regenerate();
            
            return redirect()->intended('/dashboard');
        }



        return redirect()->back()->withErrors(['msg' => 'Kombinasi Salah']);
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}