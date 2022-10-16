<?php

namespace App\Http\Controllers;

use App\Models\tb_menu;
use Illuminate\Http\Request;

class editmenuController extends Controller
{
    public function index()
    {
        $data = tb_menu::all();
        return view('pages.editmenu', ['data' => $data]);
    }
    public function delete($id)
    {
        tb_menu::find($id)->delete();
        return redirect()->route('editmenu');
    }
    public function update()
    {
        // dd(request()->all());
        $data = tb_menu::find(request()->id);
        $data->menu = request()->menu;
        $data->harga = request()->harga;
        $data->jenis = request()->jenis;
        $data->update();
        return redirect()->route('editmenu');
    }
}