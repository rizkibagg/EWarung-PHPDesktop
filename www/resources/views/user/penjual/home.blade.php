@extends('layout.master')

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#deleteBarang', function(e){
                e.preventDefault();
                var data_id = $(this).attr("data-id");
                var data_nama = $(this).attr("data-nama");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Kamu ingin menghapus  " + data_nama + " ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/barang/" + data_id + "/delete",
                        Swal.fire(
                        'Deleted!',
                        data_nama + ' sudah terhapus.',
                        'success'
                        )
                    }
                    })

            });
        });
    </script>
@endpush

@section('content')
        <!-- Products Start -->
        <div class="text-center mt-5 mb-4">
            <h1 class="section-title px-5"><span class="px-2">{{ $warung->nama }}</span></h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 mt-3">
                    <div class="card">
                        <div class="card-header"><h5 class="text-center">Foto Warung</h5></div>
                        <a class="img-box"><img class="anima" src="{{asset('fotowarung/'. $warung->fotowarung)}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-8 mt-3 mb-5">
                    <div class="card">
                        <div class="card-header"><h5 class="text-center">Informasi Warung</h5></div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="namawarung" class="col-md-4 col-lg-3 col-form-label">Nama Warung</label>
                                <div class="col-md-1 col-lg-1 mt-2 mt-2">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7 col-lg-8 mt-2 mt-2">
                                    <label>{{ $warung->nama }}</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomorhpwarung" class="col-md-4 col-lg-3 col-form-label">No. Hp</label>
                                <div class="col-md-1 col-lg-1 mt-2 mt-2">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7 col-lg-8 mt-2">
                                    <label>{{ $warung->nomorhp }}</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamatwarung" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                                <div class="col-md-1 col-lg-1 mt-2 mt-2">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7 col-lg-8 mt-2">
                                    <label>{{ $warung->alamat }}</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kodepos" class="col-md-4 col-lg-3 col-form-label">Kode Pos</label>
                                <div class="col-md-1 col-lg-1 mt-2 mt-2">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7 col-lg-8 mt-2">
                                    <label >{{ $warung->kodepos }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <label for="biodatawarung" class="col-md-4 col-lg-3 col-form-label">Biodata</label>
                                <div class="col-md-1 col-lg-1 mt-2 mt-2">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7 col-lg-8 mt-2">
                                    <label ><p>{{ $warung->biodata }}</p></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    @if (!empty($users_id))
                        @if ($warung->users_id == $users_id->id)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#staticBackdrop">
                                Add New Product
                            </button>
                        @else
                            <h6>List product yang ada di warung ini..</h6>
                        @endif
                    @else
                        <h6>List product yang ada di warung ini..</h6>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="width: 700px">
                            <div class="modal-content">
                                <form action="/barang" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Input Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="fotobarang" class="col-sm-3 col-form-label">Foto Barang</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control-file" id="fotobarang" name="fotobarang" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama Barang</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <select class="custom-select" id="kategori" name="kategori" required>
                                                    <option selected>Pilih Kategori...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" id="harga" name="harga" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        {{-- Untuk memanggil Warung id --}}
                                        <div class="form-group">
                                            <input type="hidden" name="warung_id" class="form-control" value="{{ $warung->users_id }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col" class="text-center">Harga</th>
                                @if (!empty($users_id))
                                    @if ($warung->users_id === $users_id->id)
                                        <th scope="col" class="text-center">Action</th>
                                    @else

                                    @endif
                                @else

                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($barang as $item)
                                <tr>
                                    @if (!empty($users_id))
                                        @if ($item->warung_id === $warung->users_id)
                                            <td scope="row"><?php echo $no++; ?>.</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->jumlah }}</td>
                                            <td class="text-center">Rp. {{ $item->harga }}</td>
                                            @if ($item->warung_id === $users_id->id)
                                                <td class="text-center">
                                                    {{-- <a class="badge bg-warning text-white" type="submit" href="/warung/{{$warung->users_id}}/edit/{{$item->id}}">Edit</a> --}}
                                                    <!-- Button trigger modal -->
                                                    <a type="submit" class="badge bg-warning text-white" data-toggle="modal" data-target="#ModalBarang{{$item->id}}">Edit</a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="ModalBarang{{$item->id}}" data-keyboard="false" tabindex="-1" aria-labelledby="ModalBarangLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" style="width: 700px">
                                                            <div class="modal-content">
                                                                <form action="/barang/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalBarangLabel">Edit Product {{$item->nama}}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label for="fotobarang" class="col-sm-3 col-form-label">Foto Barang</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="file" class="form-control-file" id="fotobarang" name="fotobarang">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-3 col-form-label">Nama Barang</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="nama" name="nama" value="{{$item->nama}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$item->jumlah}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="number" class="form-control" id="harga" name="harga" value="{{$item->harga}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="3">{{$item->deskripsi}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        {{-- Untuk memanggil Warung id --}}
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="warung_id" class="form-control" value="{{ $warung->users_id }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a class="badge bg-danger text-white" type="submit" href="/barang/{{$item->id}}/delete">Delete</a> --}}
                                                    <a class="badge bg-danger text-white" href="{{ url('') }}" type="submit" id="deleteBarang" data-id="{{$item->id}}" data-nama="{{$item->nama}}">Delete</a>
                                                </td>
                                            @else

                                            @endif
                                        @else

                                        @endif
                                    @else
                                        @if ($item->warung_id === $warung->users_id)
                                            <td scope="row"><?php echo $no++; ?>.</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-center">{{ $item->jumlah }}</td>
                                            <td class="text-center">Rp. {{ $item->harga }}</td>
                                        @endif
                                    @endif
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 mb-4">
            <h2 class="section-title px-5"><span class="px-2">Existing Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @forelse ($barang as $item)
                @if (!empty($users_id))
                    @if ($item->warung_id === $warung->users_id)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{asset('fotobarang/'. $item->fotobarang)}}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $item->nama }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>Rp. {{ $item->harga }}</h6><h6 class="text-muted ml-2"></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <!-- Button trigger modal -->
                                    <a href="" class="btn btn-sm text-dark p-0" data-toggle="modal" data-target="#ViewDetail{{ $item->id }}"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ViewDetail{{ $item->id }}" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" style="width: 1000px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ $item->nama }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card mb-3" style="border: none">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4">
                                                                <img class="card-img w-100" src="{{asset('fotobarang/'. $item->fotobarang)}}" alt="">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                                                    <h6>Rp. {{ $item->harga }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    @auth
                                                        @if ( Auth::user()->kategori == 'Pembeli')
                                                            <a href="{{ route('add_cart', $item->id ) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @auth
                                        @if ( Auth::user()->kategori == 'Pembeli')
                                            <a href="{{ route('add_cart', $item->id ) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @else

                    @endif
                @else
                    @if ($item->warung_id === $warung->users_id)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{asset('fotobarang/'. $item->fotobarang)}}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $item->nama }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>Rp. {{ $item->harga }}</h6><h6 class="text-muted ml-2"></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <!-- Button trigger modal -->
                                    <a href="" class="btn btn-sm text-dark p-0" data-toggle="modal" data-target="#ViewDetail{{ $item->id }}"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ViewDetail{{ $item->id }}" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" style="width: 1000px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ $item->nama }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card mb-3" style="border: none">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4">
                                                                <img class="card-img w-100" src="{{asset('fotobarang/'. $item->fotobarang)}}" alt="">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                                                    <h6>Rp. {{ $item->harga }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    @auth
                                                        @if ( Auth::user()->kategori == 'Pembeli')
                                                            <a href="{{ route('add_cart', $item->id ) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @auth
                                        @if ( Auth::user()->kategori == 'Pembeli')
                                            <a href="{{ route('add_cart', $item->id ) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @empty

            @endforelse
        </div>
        <!-- Products End -->
@endsection
