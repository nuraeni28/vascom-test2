<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $judul = 'Dashboard';
        // $pd = Produk::all()->count();
        $pdAk = Produk::where('status','aktif')->get();
        // $usersAk = User::where('status','aktif')->count();
        // $users = User::all()->count();
        // $p = Produk::latest()->take(10)->get();

        return view('home.index')->with(compact('pdAk'));
    }
}
