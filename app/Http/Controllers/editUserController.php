<?php

namespace App\Http\Controllers;

use App\Models\menuke;
use App\Models\tb_statepesanan;
use App\Models\User;
use Illuminate\Http\Request;

class editUserController extends Controller
{
    public function index()
    {
        $data = tb_statepesanan::find(1);
        $datamenu = menuke::all();

        return view('pages.editUser', ['datanow' => $data->data, 'datamenu' => $datamenu]);
    }
    public function update()
    {

        $validate = request()->validate([
            'nama' => 'required',
            'password' => ['required', 'min:5']
        ], [
            'required' => 'Perlu diisi !!!',
            'unique' => 'NRP Sudah Ada !!!',
            'numeric' => 'Harus angka !!!',
            'password.min' => 'Minimal 5 Karakter !!!',
        ]);
        $data = User::find(request()->id);
        $data->nama = request()->nama;
        $data->password = bcrypt(request()->password);
        $data->update();
        return redirect()->route('edituser')->with(['success' => 'Berhasil Diupdate!!!!']);
    }

    public function updatename()
    {
        $data = User::where('username', '=', request()->username)->first();
        if ($data != null) {

            $data2 = User::find($data->id);
            $data2->nama = request()->nama;
            $data2->update();
            return response()->json(['status' => 'Berhasil']);
        }
        return response()->json(['status' => 'gagal']);
    }
    public function editstate()
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $data = tb_statepesanan::find(1);
        $output->writeln($data);
        $data->data = request()->data;
        $data->update();
        return redirect()->back();
    }
    public function editstatepy()
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $data = tb_statepesanan::find(1);
        $output->writeln($data);
        $data->data = !$data->data;
        $data->update();
        // return redirect()->back();
    }
}
