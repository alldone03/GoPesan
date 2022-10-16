<?php

namespace App\Http\Controllers;

use App\Models\tb_menu;
use App\Models\tb_pesanan;
use App\Models\tb_statepesanan;
use Illuminate\Http\Request;

class pesancont extends Controller
{
    public function index()
    {
        $menu = tb_menu::all();
        // dd($menu);
        $data = tb_statepesanan::find(1);
        return view('pages.pesan', ['menu' => $menu, 'datanow' => $data->data]);
    }
    public function pesan()
    {
        // dd(request()->all());
        $validate = request()->validate([
            'username' => 'required',
            'nama' => 'required',
            'pesanan' => 'required',

        ]);
        $hasildata = tb_menu::find($validate['pesanan']);
        // dd(
        //     $hasildata
        // );
        // dd(request()->all());
        tb_pesanan::create(['nama' => $validate['nama'], 'pesanan' => $hasildata->menu, 'harga' => $hasildata->harga, 'jenis' => $hasildata->jenis]);
        return redirect('/');
    }

    public function tambahmenu()
    {
        $validated = request()->validate([
            'menu' => 'required|string',
            'harga' => 'required|numeric',
            'jenis' => 'required'
        ]);

        $validated['menu'] = ucwords(request()->menu);

        tb_menu::create($validated);
        return redirect('/pesan');
    }
}