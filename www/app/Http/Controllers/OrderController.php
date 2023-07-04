<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'nomerhp' => 'required',
            'alamat' => 'required',
            'rtrw' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'kodepos' => 'required',
            'tanggal' => 'required',
            'pembayaran' => 'nullable',
            'infoproduk' => 'required',
            'status' => 'required',
            'total_barang' => 'required',
            'total_harga' => 'required',
            'users_id' => 'required',
            'warung_id' => 'required',
        ]);

        $order = new Order;

        $order->nama = $request->nama;
        $order->username = $request->username;
        $order->email = $request->email;
        $order->nomerhp = $request->nomerhp;
        $order->alamat = $request->alamat;
        $order->rtrw = $request->rtrw;
        $order->kecamatan = $request->kecamatan;
        $order->kota = $request->kota;
        $order->kodepos = $request->kodepos;
        $order->tanggal = $request->tanggal;
        $order->infoproduk = implode(',', $request->input('infoproduk'));
        $order->status = $request->status;
        $order->total_barang = implode(',', $request->input('total_barang'));
        $order->total_harga = $request->total_harga;
        $order->users_id = $request->users_id;
        $order->warung_id = implode(',', $request->input('warung_id'));

        $order->save();

        return redirect('/order')->with('success', 'Anda Berhasil Order. Lanjutkan ke Pembayaran!!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'pembayaran' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $order = Order::find($id);

        // Cek apakah ada file pembayaran yang diunggah
        if ($request->hasFile('pembayaran')) {
            $file = $request->file('pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pembayaran'), $filename);

            // Update kolom pembayaran dengan nama file yang diunggah
            $order->pembayaran = $filename;
        }

        $order->save();
        return redirect()->back()->with('toast_info', 'Anda berhasil Upload!');
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('toast_info', 'Order berhasil dibatalkan!');
    }
}
