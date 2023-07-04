@extends('layout.master')

@section('dashboard')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Keranjang</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <?php
                $no = 1;
                $subtotal = 0;
            ?>
            @if(empty($cart) || count($cart) == 0)
                <div class="col-12">
                    <h3 class="section-title px-5"><span class="px-2">Belum ada Produk di Keranjang!</span></h3>
                </div>
            @else
                <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>No.</th>
                                <th>Product</th>
                                <th>Harga</th>
                                <th>Jumlah Barang</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($cart as $id => $details)
                                <?php $total = $details['harga'] * $details['quantity'] ?>
                                <tr data-id="{{ $id }}">
                                    <td class="align-middle">{{ $no++ }}.</td>
                                    <td class="align-middle"><img src="{{asset('fotobarang/'. $details['fotobarang'])}}" alt="" style="width: 50px;">{{ $details['nama'] }}</td>
                                    <td class="align-middle">Rp. {{ $details['harga'] }}</td>
                                    <td class="align-middle">
                                        <form action="{{ route('update_cart') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <input type="hidden" name="item_id" value="{{ $id }}">
                                                <input type="hidden" name="warung_id" value="{{ $details['warung_id'] }}">
                                                <a data-id="{{ $id }}" class="btn btn-sm btn-primary btn-minus" onclick="decrementQuantity(this)"><i class="fa fa-minus"></i></a>
                                                <input id="input-qty-{{ $id }}" name="quantity" type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $details['quantity'] }}">
                                                <a data-id="{{ $id }}" class="btn btn-sm btn-primary btn-plus" onclick="incrementQuantity(this)"><i class="fa fa-plus"></i></a>
                                            </div>
                                    </td>
                                    <td class="align-middle total">Rp. {{ $details['harga'] * $details['quantity'] }}</td>
                                    <td class="align-middle">
                                        <button type="submit" class="btn btn-sm btn-primary text-white">Update</button>
                                        </form>
                                        <a class="btn btn-sm btn-primary" href="{{ route('hapus_cart', $id ) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php $subtotal += $total; ?>
                                @push('scripts')
                                    <script type="text/javascript">

                                        function incrementQuantity(btnPlus) {
                                            var inputQty = btnPlus.parentNode.querySelector('input[name="quantity"]');
                                            var currentValue = parseInt(inputQty.value);
                                            var itemId = btnPlus.getAttribute('data-id');

                                            // Kirim permintaan AJAX untuk mengambil jumlah item
                                            fetch('/get-item-quantity/' + itemId)
                                                .then(response => response.json())
                                                .then(data => {
                                                    var maxQuantity = data.quantity; // Mengambil jumlah item dari respons JSON

                                                    if (currentValue < maxQuantity) {
                                                        var newQuantity = currentValue + 1;
                                                        inputQty.value = newQuantity;
                                                    }
                                                })
                                                .catch(error => {
                                                    console.log(error);
                                                });
                                        }
                                        function decrementQuantity(btnMinus) {
                                            var inputQty = btnMinus.parentNode.querySelector('input[name="quantity"]');
                                            var currentValue = parseInt(inputQty.value);
                                            var itemId = btnMinus.getAttribute('data-id');

                                            // Kirim permintaan AJAX untuk mengambil jumlah item
                                            fetch('/get-item-quantity/' + itemId)
                                                .then(response => response.json())
                                                .then(data => {
                                                    var maxQuantity = data.quantity; // Mengambil jumlah item dari respons JSON

                                                    if (currentValue > 1) {
                                                        var newQuantity = currentValue - 1;
                                                        inputQty.value = newQuantity;
                                                    }
                                                })
                                                .catch(error => {
                                                    console.log(error);
                                                });
                                        }

                                    </script>
                                @endpush
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-8"></div>
                <div class="col-lg-4">
                    <form action="/checkout">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium total">Rp. {{ $subtotal }}</h6>
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
                                    <h6 class="font-weight-medium">Total Barang</h6>
                                    <h6 class="font-weight-medium">{{ count((array) session('cart')) }}</h6>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total Harga</h5>
                                    <h5 class="font-weight-bold grand-total">Rp. {{ $grandtotal }}</h5>
                                </div>
                                <button class="btn btn-block btn-primary my-3 py-3" type="submit">Proceed To Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <!-- Cart End -->
@endsection
