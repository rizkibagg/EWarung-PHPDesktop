<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Profile;
use App\Models\User;
use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('user.admin.login', ['title' => 'Login Admin']);
    }
    public function adminLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Cari admin berdasarkan username
        $admin = Admin::where('username', $username)->first();

        if ($admin) {
            // Verifikasi password
            if (Hash::check($password, $admin->password)) {
                // Password cocok, lakukan login
                Session::put('admin', $admin);

                // Tampilkan halaman admin setelah login berhasil
                $user = Auth::id();
                $profile = Profile::where('id', $user)->first();
                $users_id = User::where('id', $user)->first();
                $dataorder = Order::all();
                $admin = Session::get('admin');
                return view('user.admin.home', ['title' => 'Dashboard Admin', 'profile' => $profile, 'users_id' => $users_id, 'dataorder' => $dataorder])->with('admin', $admin);
            }
        }
        // Autentikasi gagal
        return redirect()->back();
    }
    public function show(){
        $user = Auth::id();
        $profile = Profile::where('id', $user)->first();
        $users_id = User::where('id', $user)->first();
        $dataorder = Order::all();
        $admin = Session::get('admin');
        return view('user.admin.home', ['title' => 'Dashboard Admin', 'profile' => $profile, 'users_id' => $users_id, 'dataorder' => $dataorder])->with('admin', $admin);
    }
    public function adminLogout()
    {
        // Hapus data admin dari session
        Session::forget('admin');

        // Redirect ke halaman login setelah logout berhasil
        return view('user.admin.login', ['title' => 'Login Admin']);
    }
    public function updateStatus(Request $request, $id)
    {
        // Temukan pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Perbarui status pesanan
        $order->status = $request->status;

        // Simpan perubahan
        $order->save();

        // Redirect ke halaman yang sesuai setelah perubahan berhasil
        return redirect()->back()->with('success', 'Berhasil mengubah Status!');
    }
    public function showRekrut(){
        $admin = Session::get('admin');
        return view('user.admin.rekrutmen', ['title' => 'Rekrutmen'])->with('admin', $admin);
    }
    public function showUsers(){
        $users = User::all();

        // Mendapatkan data Warung terkait dengan pengguna (User) dengan users_id yang sama
        $warung = Warung::whereHas('user', function ($query) {
            $query->whereColumn('users.id', 'warung.users_id');
        })->get();

        $admin = Session::get('admin');
        return view('user.admin.users', ['title' => 'Users', 'users' => $users, 'warung' => $warung])->with('admin', $admin);
    }
}
