<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class promotecont extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.promote', ['data' => $data]);
    }
    public function promote()
    {
        $data = User::find(request()->id)->update(request()->all());
        // dd($data);
        return redirect()->route('promote');
    }
    public function deleteuser($id)
    {
        $data = User::find(request()->id)->delete();
        // dd($data);
        return redirect()->route('promote');
    }
}