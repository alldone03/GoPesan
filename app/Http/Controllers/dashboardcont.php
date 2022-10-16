<?php

namespace App\Http\Controllers;

use App\Models\tb_menu;
use App\Models\tb_pesanan;
use App\Models\tb_statepesanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboardcont extends Controller
{
    public function index()
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln(Auth::user()->nama);
        $datastatepesanns = tb_statepesanan::find(1);
        $user = User::all()->where('role', '<=', '1');
        $data = tb_pesanan::all()->whereBetween('created_at', [today(), Carbon::tomorrow()]);
        $data_makanan = [];
        $data_uang = [];
        $nama_admin = [];
        $uang_admin = [];
        $datatamppungan = [];

        $datatamppungannamamakanan = [];
        $datatamppungannamaminuman = [];
        $datatbmenu = tb_menu::all()->sortBy('menu');
        foreach ($datatbmenu as $key => $value) {
            if ($value->jenis == 0) {
                array_push($datatamppungannamamakanan, ['menu' => $value->menu, 'jumlah' => $data->where('pesanan', $value->menu)->count(), 'jumlahHarga' => $data->where('pesanan', $value->menu)->count() * $value->harga]);
            } else {
                array_push($datatamppungannamaminuman, ['menu' => $value->menu, 'jumlah' => $data->where('pesanan', $value->menu)->count(), 'jumlahHarga' => $data->where('pesanan', $value->menu)->count() * $value->harga]);
            }
        }
        foreach ($user as $r) {
            $dataku = tb_pesanan::all()->where('verifiedby', '=', $r->nama)->whereBetween('created_at', [today(), Carbon::tomorrow()])->sum('bayar');
            array_push($uang_admin, $dataku);
            array_push($nama_admin, $r->nama);
        }
        foreach ($data as $d) {
            array_push($data_makanan, $d->harga);
            array_push($data_uang, $d->bayar);
        }
        for ($i = 0; $i < count($user); $i++) {
            array_push($datatamppungan, ['nama_admin' => $nama_admin[$i], 'uang_admin' => $uang_admin[$i]]);
        }
        // dd($datatamppungan);
        if (Auth::user()->role == 0 || Auth::user()->role == 1) {
            return view('pages.dashboardadmin', ['data' => $data, 'data_makanan' => array_sum($data_makanan), 'data_uang' => array_sum($data_uang), 'uang_admin' => $datatamppungan, 'datacountmakanan' => $datatamppungannamamakanan, 'datacountminuman' => $datatamppungannamaminuman, 'datanow' => $datastatepesanns->data]);
        }
        return view('pages.dashboard', ['data' => $data, 'data_makanan' => array_sum($data_makanan), 'data_uang' => array_sum($data_uang), 'datanow' => $datastatepesanns->data]);
    }
    public function checktable()
    {
        $data = DB::table('tb_pesanans')->select('updated_at')->orderByDesc('updated_at')->first();

        return response()->json($data);
    }
    public function ambildata($id)
    {
        $data = tb_pesanan::find(request()->id);
        return response()->json($data);
    }
    public function updatelistpesanan()
    {
        $array = [];
        $data = tb_pesanan::all()->whereBetween('created_at', [today(), Carbon::tomorrow()]);
        foreach ($data as $key => $u) {
            array_push($array, $u);
        }
        return response()->json($array);
    }
}