<?php

namespace App\Http\Controllers;

use App\Models\tb_pesanan;
use Illuminate\Http\Request;

class dashboardadmincont extends Controller
{
    public function index()
    {

        return redirect('/dashboard');
    }
    public function edit()
    {
        // dd(request()->all());
        $data = tb_pesanan::find(request()->id)->update(request()->all());
        // dd($data);
        return redirect('/dashboard');
    }
    public function delete($id)
    {
        $hasil = tb_pesanan::find($id)->delete();
        return redirect('/dashboard');
    }
}