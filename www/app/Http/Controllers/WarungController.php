<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Profile;
use App\Models\User;
use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
class WarungController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $users_id = User::where('id', $user)->first();
        $warung = Warung::all();
        return view('user.home.shop', ['title' => 'Warung', 'users_id' => $users_id])->with('warung', $warung);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fotowarung' => 'required|mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'nomorhp' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
            'biodata' => 'required',
            'users_id' => 'required',
        ]);

        $fotowarungName = time().'.'.$request->fotowarung->extension();

        $request->fotowarung->move(public_path('fotowarung'), $fotowarungName);

        $warung = new Warung;
        $warung->fotowarung = $fotowarungName;
        $warung->nama = $request->nama;
        $warung->nomorhp = $request->nomorhp;
        $warung->alamat = $request->alamat;
        $warung->kodepos = $request->kodepos;
        $warung->biodata = $request->biodata;
        $warung->users_id = $request->users_id;

        $warung->save();

        return redirect('/warung')->with('success', 'Warung berhasil Dibuat!');
    }
    public function show($id)
    {
        $user = Auth::id();
        $users_id = User::where('id', $user)->first();
        $warung = Warung::find($id);
        return view('user.penjual.home', ['title' => $warung->nama , 'users_id' => $users_id])->with('warung', $warung);
    }
    public function edit($id)
    {
        $user = Auth::id();
        $users_id = User::where('id', $user)->first();
        $warung = Warung::find($id);
        return view('user.penjual.editwarung', ['title' => 'Edit ' . $warung->nama, 'users_id' => $users_id, 'warung' => $warung]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'fotowarung' => 'mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'nomorhp' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
            'biodata' => 'required',
            'users_id' => 'required',
        ]);

        $warung = Warung::find($id);
        $warung->nama = $request->nama;
        $warung->nomorhp = $request->nomorhp;
        $warung->alamat = $request->alamat;
        $warung->kodepos = $request->kodepos;
        $warung->biodata = $request->biodata;
        $warung->users_id = $request->users_id;

        if ($request->has('fotowarung')){
            $path = 'fotowarung/';
            File::delete($path. $warung->fotowarung);
            $fotowarungName = time().'.'.$request->fotowarung->extension();
            $request->fotowarung->move(public_path('fotowarung'), $fotowarungName);
            $warung->fotowarung = $fotowarungName;
        }

        $warung->save();
        return redirect('warung')->with('success', 'Warung berhasil Diupdate!');
    }
    // public function destroy($id)
    // {
    //     $warung = Warung::find($id);
    //     $path = 'fotowarung/';
    //     File::delete($path. $warung->fotowarung);
    //     $warung->delete();
    //     return redirect('warung')->with('info', 'Warung berhasil Dihapus!');
    // }
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $warung = Warung::findOrFail($id);
            $path = 'fotowarung/';
            File::delete($path . $warung->fotowarung);

            // Hapus barang dengan warung_id yang sama dengan users_id di warung yang dihapus
            Barang::where('warung_id', $warung->users_id)->delete();

            // Hapus file dengan warung_id yang sama dengan users_id di folder fotobarang
            // $barangFiles = Barang::where('warung_id', $warung->users_id)->get(['fotobarang']);
            // foreach ($barangFiles as $barangFile) {
            //     File::delete('fotobarang/' . $barangFile->fotobarang);
            // }

            $warung->delete();

            DB::commit();

            return redirect('warung')->with('info', 'Warung berhasil Dihapus!');
        } catch (\Exception $e) {
            DB::rollback();

            // Tangani kesalahan jika terjadi
            return redirect('warung')->with('error', 'Terjadi kesalahan saat menghapus warung!');
        }
    }
    public function showbarang($id)
    {
        $user = Auth::id();
        $users_id = User::where('id', $user)->first();
        $warung = Warung::find($id);
        $barang = Barang::all();
        return view('user.penjual.home', ['title' => $warung->nama , 'users_id' => $users_id, 'barang' => $barang])->with('warung', $warung);
    }
}
