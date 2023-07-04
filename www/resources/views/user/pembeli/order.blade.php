@extends('layout.master')

@section('dashboard')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Pesanan</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Order</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#deleteOrder', function(e){
                e.preventDefault();
                var data_id = $(this).attr("data-id");
                var data_nama = $(this).attr("data-nama");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Kamu ingin membatalkan pesananmu dengan produk " + data_nama + " ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, batalkan sekarang!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/order/" + data_id + "/delete",
                        Swal.fire(
                        'Dibatalkan!',
                        'Pesananmu dengan produk ' + data_nama + ' sudah dibatalkan.',
                        'success'
                        )
                    }
                    })

            });
        });
    </script>
@endpush

@section('content')
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="mb-4">
                    <div class="row">
                        <div class="card-body">
                            @php
                                $hasOrder = false;
                            @endphp
                            @foreach ($dataorder as $item)
                                @if (!empty($item->users_id) && $item->users_id == Auth::user()->id)
                                    @php
                                        $hasOrder = true;
                                    @endphp
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Pemesan</th>
                                                <th scope="col" class="text-center">Tanggal</th>
                                                <th scope="col">Informasi Produk</th>
                                                <th scope="col" class="text-center">Jumlah</th>
                                                <th scope="col" class="text-center">Total Harga</th>
                                                <th scope="col" class="text-center">Action</th>
                                                <th scope="col" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($dataorder as $item)
                                                @if (!empty($item->users_id) && $item->users_id == Auth::user()->id)
                                                    <tr>
                                                        <td scope="row"><?php echo $no++; ?>.</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->tanggal)->format('d/m/Y H:i:s') }}</td>
                                                        {{-- <td>{{ $item->tanggal }}</td> --}}
                                                        <td>
                                                            @foreach (explode(',', $item->infoproduk) as $infoproduk)
                                                                {{ $infoproduk }} <br>
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            @foreach (explode(',', $item->total_barang) as $total_barang)
                                                                <i class="fas fa-times"></i> {{ $total_barang }} <br>
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">Rp. {{ $item->total_harga }}</td>
                                                        <td class="text-center">
                                                            <!-- Button trigger modal -->
                                                            <a class="badge badge-info badge-sm" type="button" data-toggle="modal" data-target="#bayarModal-{{$item->id}}" href="/#bayar">Bayar</a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="bayarModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="bayarModalLabel">Pembayaran melalui Dana</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <img src="{{ asset('bootslander/assets/img/barcode_dana.jpeg') }}" alt="">
                                                                            <p style="font-size: 13px"><strong>Catatan:</strong> Pastikan kirim dengan nominal yang sesuai dengan total harga yang anda pesan. Jika sudah Upload Bukti Pembayaran.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Button trigger modal -->
                                                            <a class="badge badge-info badge-sm" data-toggle="modal" data-target="#uploadBuktiModal-{{$item->id}}" href="/#upload">Upload Bukti</a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="uploadBuktiModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <form action="/bukti/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="uploadBuktiModalLabel">Upload Bukti Pembayaran</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group row">
                                                                                    <label for="pembayaran" class="col-sm-2 col-form-label">File</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="file" class="form-control-file" id="pembayaran" name="pembayaran" required>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="font-size: 13px"><strong>Catatan:</strong> Pastikan anda mengirim Bukti Pembayaran dengan benar.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if ($item->status === 'Pending')
                                                                {{-- <a class="badge badge-danger badge-sm" href="/">Cancel Order</a> --}}
                                                                <a class="badge bg-danger text-white" href="{{ url('') }}" type="submit" id="deleteOrder" data-id="{{$item->id}}" data-nama="{{$item->infoproduk}}">Cancel Order</a>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge badge-pill
                                                                @if ($item->status == 'Pending')
                                                                    badge-secondary
                                                                @elseif ($item->status == 'Packing')
                                                                    badge-warning
                                                                @elseif ($item->status == 'Delivery')
                                                                    badge-warning
                                                                @elseif ($item->status == 'Success')
                                                                    badge-success
                                                                @endif">{{ $item->status }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @break
                                @endif
                            @endforeach
                            @if (!$hasOrder)
                                <div class="col-12">
                                    <h3 class="section-title px-5"><span class="px-2">Belum ada Pesanan! Pesan Sekarang!!!</span></h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
