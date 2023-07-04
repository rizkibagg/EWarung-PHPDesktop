<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Profile;
use App\Models\User;
use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $users_id = Profile::where('users_id', $user)->first();
        $warung = Warung::all();
        $barang = Barang::all();

        return view('user.home.home', ['title' => 'Beranda', 'users_id' => $users_id, 'barang' => $barang])->with('warung', $warung);
    }

}
