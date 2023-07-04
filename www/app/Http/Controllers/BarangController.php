<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\Profile;
use App\Models\User;
use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fotobarang' => 'required|mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'warung_id' => 'required',
        ]);

        $fotobarangName = time().'.'.$request->fotobarang->extension();

        $request->fotobarang->move(public_path('fotobarang'), $fotobarangName);

        $barang = new Barang;
        $barang->fotobarang = $fotobarangName;
        $barang->nama = $request->nama;
        $barang->jumlah = $request->jumlah;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        $barang->warung_id = $request->warung_id;

        $barang->save();
        return redirect()->back()->with('toast_success', 'Barang Berhasil Ditambah!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'fotobarang' => 'mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'warung_id' => 'required',
        ]);

        $barang = Barang::find($id);
        $barang->nama = $request->nama;
        $barang->jumlah = $request->jumlah;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        $barang->warung_id = $request->warung_id;

        if ($request->has('fotobarang')){
            $path = 'fotobarang/';
            File::delete($path. $barang->fotobarang);
            $fotobarangName = time().'.'.$request->fotobarang->extension();
            $request->fotobarang->move(public_path('fotobarang'), $fotobarangName);
            $barang->fotobarang = $fotobarangName;
        }

        $barang->save();
        return redirect()->back()->with('toast_success', 'Barang Berhasil Diupdate!');
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $path = 'fotobarang/';
        File::delete($path. $barang->fotobarang);
        $barang->delete();
        return redirect()->back()->with('toast_info', 'Barang Berhasil Dihapus!');
    }
    public function addCart($id)
    {
        $barang = Barang::find($id);
        // Membuat sesi 'cart'
        $cart = session('cart');
        $cart[$id] = [
            "fotobarang" => $barang->fotobarang,
            "nama" => $barang->nama,
            "jumlah" => $barang->jumlah,
            "harga" => $barang->harga,
            "deskripsi" => $barang->deskripsi,
            "warung_id" => $barang->warung_id,
            "quantity" => 1
        ];
        session()->put('cart',$cart);
        return redirect()->back()->with('toast_success', 'Barang masuk keranjang!');
    }
    public function cart(){
        $cart = session('cart');
        return view('user.pembeli.keranjang',['title' => 'Keranjang'])->with('cart',$cart);
    }
    public function updateCart(Request $request)
    {
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        // Ambil session 'cart' dan ubah nilai quantity pada item dengan $itemId
        $cart = session('cart');
        $cart[$itemId]['quantity'] = $quantity;

        // Simpan kembali session 'cart' dengan nilai yang telah diubah
        session(['cart' => $cart]);
        return redirect()->back()->with('toast_success', 'Jumlah berhasil Diupdate!');
    }
    public function hapusCart($id)
    {
        $cart = session('cart');
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->back()->with('toast_info', 'Barang dihapus dari Keranjang!');
    }
    public function cartCheckout()
    {
        $user = Auth::id();
        $profile = Profile::where('users_id', $user)->first();
        $users_id = User::where('id', $user)->first();
        $cart = session('cart');
        return view('user.pembeli.checkout',['title' => 'Checkout', 'users_id' => $users_id, 'profile' => $profile])->with('cart',$cart);
    }
    public function order()
    {
        $user = Auth::id();
        $profile = Profile::where('id', $user)->first();
        $users_id = User::where('id', $user)->first();
        $dataorder = Order::all();
        // Menghapus sesi 'cart'
        Session::forget('cart');
        return view('user.pembeli.order',['title' => 'Order', 'profile' => $profile, 'users_id' => $users_id])->with('dataorder', $dataorder);
    }
}
