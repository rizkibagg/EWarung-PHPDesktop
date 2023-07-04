<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $profile = Profile::where('id', $user)->first();
        $users_id = User::where('id', $user)->first();
        $warung = Warung::all();
        return view('user.home.profile', ['title' => 'Profile', 'users_id' => $users_id, 'warung' => $warung])->with('profile', $profile);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'nomorhp' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'biodata' => 'required',
        ]);
        User::where('id', $id)->update([
            'nama' => $request['nama'],
            'username' => $request['username'],
        ]);
        Profile::where('id', $id)->update([
            'nomorhp' => $request['nomorhp'],
            'alamat' => $request['alamat'],
            'pekerjaan' => $request['pekerjaan'],
            'biodata' => $request['biodata'],
        ]);

        return redirect('/profile')->with('toast_success', 'Profile berhasil Diupdate!');
    }
}
