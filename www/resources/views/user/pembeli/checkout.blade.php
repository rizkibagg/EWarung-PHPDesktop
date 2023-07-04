@extends('layout.master')

@section('dashboard')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Checkout Start -->
    <form action="/order" method="POST">
        @csrf
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="nama">Nama</label>
                                <input name="nama" id="nama" class="form-control" type="text" value="{{ $profile->user->nama }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="username">Username</label>
                                <input name="username" id="username" class="form-control" type="text" value="{{ $profile->user->username }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail</label>
                                <input name="email" id="email" class="form-control" type="text" value="{{ $profile->user->email }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="nomerhp">No. Hp</label>
                                <input name="nomerhp" id="nomerhp" class="form-control" type="text" value="{{ $profile->nomorhp }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" id="alamat" style="height: 70px" required>{{ $profile->alamat }}</textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="rtrw">RT / RW</label>
                                <input name="rtrw" id="rtrw" class="form-control" type="text" placeholder="000 / 000" required>
                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input name="kecamatan" id="kecamatan" class="form-control" type="text" placeholder="Wates" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kota">Kota / Kabupaten</label>
                                <input name="kota" id="kota" class="form-control" type="text" placeholder="Kulon Progo" required>
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="custom-select" id="kecamatan" name="kecamatan" required>
                                    <option value="" selected>Pilih Kecamatan...</option>
                                    <option value="Panjatan">Panjatan</option>
                                    <option value="Lendah">Lendah</option>
                                    <option value="Galur">Galur</option>
                                    <option value="Girimulyo">Girimulyo</option>
                                    <option value="Kalibawang">Kalibawang</option>
                                    <option value="Kokap">Kokap</option>
                                    <option value="Nanggulan">Nanggulan</option>
                                    <option value="Pengasih">Pengasih</option>
                                    <option value="Samigaluh">Samigaluh</option>
                                    <option value="Sentolo">Sentolo</option>
                                    <option value="Wates">Wates</option>
                                    <option value="Temon">Temon</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kota">Kota / Kabupaten</label>
                                <select class="custom-select" id="kota" name="kota" required>
                                    <option value="" selected>Pilih Kota / Kabupaten...</option>
                                    <option value="Kulon Progo">Kulon Progo</option>
                                    {{-- <option value="Bantul">Bantul</option>
                                    <option value="Sleman">Sleman</option>
                                    <option value="Gunung Kidul">Gunung Kidul</option>
                                    <option value="Yogyakarta">Yogyakarta</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kodepos">Kode POS</label>
                                <input name="kodepos" id="kodepos" class="form-control" type="text" placeholder="12345" required>
                            </div>
                            <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->toDateTimeString() }}">
                            {{-- <input type="hidden" name="pembayaran" value="-"> --}}
                            <input type="hidden" name="users_id" value="{{ $profile->users_id }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php
                        $subtotal = 0;
                    ?>
                    @if(empty($cart) || count($cart) == 0)
                        <h3 class="text-center">Belum ada Produk!</h3>
                    @else
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Products</h5>
                                @foreach ($cart as $id => $details)
                                    <div class="d-flex justify-content-between">
                                        <p>{{ $details['nama'] }}</p>
                                        <p>x {{ $details['quantity'] }}</p>
                                        <p>Rp. {{ $details['harga'] * $details['quantity'] }}</p>
                                    </div>
                                    {{-- <input type="hidden" name="jumlah" value="{{ $details['jumlah'] - $details['quantity'] }}"> --}}
                                    <input type="hidden" name="infoproduk[]" value="{{ $details['nama'] }}">
                                    <input type="hidden" name="total_barang[]" value="{{ $details['quantity'] }}">
                                    <input type="hidden" name="warung_id[]" value="{{ $details['warung_id'] }}">
                                    <?php $total = $details['harga'] * $details['quantity'] ?>
                                    <?php $subtotal += $total; ?>
                                @endforeach
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">Rp. {{ $subtotal }}</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <?php
                                        $admin = 1000;
                                        $grandtotal = $subtotal + $admin;
                                    ?>
                                    <h6 class="font-weight-medium">Biaya Admin</h6>
                                    <h6 class="font-weight-medium">Rp. {{ $admin }}</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">Rp. {{ $grandtotal }}</h5>
                                    <input type="hidden" name="total_harga" value="{{ $grandtotal }}">
                                    <input type="hidden" name="status" value="Pending">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card border-secondary mb-5">
                        {{-- <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div> --}}
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->
@endsection
