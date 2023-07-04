@extends('layout.master')

@section('dashboard')
    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Selamat Datang di <br><span>Electronic Warung</span></h1>
                        <h2>Belanja disekitarmu dengan mudah dan praktis.</h2>
                        <div class="text-lg-start">
                            <a href="/warung" class="btn-get-started scrollto">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('/bootslander/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            {{-- <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g> --}}
        </svg>

    </section><!-- End Hero -->
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#deleteWarung', function(e){
                e.preventDefault();
                var data_id = $(this).attr("data-id");
                var data_nama = $(this).attr("data-nama");

                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Ingin menghapus " + data_nama + " ? " + " Jika dihapus, semua barang milikmu akan terhapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/warung/" + data_id + "/delete",
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
        {{-- <!-- Featured Start -->
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 510px;">
                            <img class="img-fluid" src="{{ asset('/eshopper/img/toko2.png') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Electronic Warung</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row mt-5 mb-4 px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Fast Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">7-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
        <!-- Featured End -->


        <!-- Categories Start -->
        <div class="text-center">
            <h2 class="section-title px-5"><span class="px-2">E-Warung Pilihan</span></h2>
        </div>

        <div class="section-empty">
            <div class="container content">
                <hr class="space" />
                <div class="flexslider carousel outer-navs" data-options="minWidth:200,itemMargin:30,numItems:3,controlNav:true,directionNav:true">
                    <ul class="slides">
                        @forelse ($warung as $item)
                            <li>
                                @if (!empty($users_id))
                                    @if ($item->users_id == $users_id->id)
                                        <div class="advs-box advs-box-multiple boxed-inverse" data-anima="scale-up" data-trigger="hover" style="background-color: #EDF1FF">
                                            <a class="img-box"><img class="anima" src="{{asset('fotowarung/'. $item->fotowarung)}}" height="250px" width="250px" alt="" /></a>
                                            <div class="advs-box-content">
                                                <h3>{{ $item->nama }}</h3>
                                                <div class="ratings">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>{{ $item->alamat }}</p>
                                                <div class="action d-flex justify-content-between">
                                                    @if (!empty($users_id))
                                                        @if ($item->users_id == $users_id->id)
                                                            <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                            <a class="btn-text" href="/warung/{{$item->id}}/edit">Edit</a>
                                                            {{-- <a class="btn-text" href="/warung/{{$item->id}}/delete">Delete</a> --}}
                                                            <a class="btn-text" href="{{ url('') }}" type="submit" id="deleteWarung" data-id="{{$item->id}}" data-nama="{{$item->nama}}">Delete</a>
                                                        @else
                                                            <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                        @endif
                                                    @else
                                                        <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="advs-box advs-box-multiple boxed-inverse" data-anima="scale-up" data-trigger="hover">
                                            <a class="img-box"><img class="anima" src="{{asset('fotowarung/'. $item->fotowarung)}}" height="250px" width="250px" alt="" /></a>
                                            <div class="advs-box-content">
                                                <h3>{{ $item->nama }}</h3>
                                                <div class="ratings">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>{{ $item->alamat }}</p>
                                                <div class="action d-flex justify-content-between">
                                                    @if (!empty($users_id))
                                                        @if ($item->users_id == $users_id->id)
                                                            <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                            <a class="btn-text" href="/warung/{{$item->id}}/edit">Edit</a>
                                                            {{-- <a class="btn-text" href="/warung/{{$item->id}}/delete">Delete</a> --}}
                                                            <a class="btn-text" href="{{ url('') }}" type="submit" id="deleteWarung" data-id="{{$item->id}}" data-nama="{{$item->nama}}">Delete</a>
                                                        @else
                                                            <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                        @endif
                                                    @else
                                                        <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="advs-box advs-box-multiple boxed-inverse" data-anima="scale-up" data-trigger="hover">
                                        <a class="img-box"><img class="anima" src="{{asset('fotowarung/'. $item->fotowarung)}}" height="250px" width="250px" alt="" /></a>
                                        <div class="advs-box-content">
                                            <h3>{{ $item->nama }}</h3>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p>{{ $item->alamat }}</p>
                                            <div class="action d-flex justify-content-between">
                                                @if (!empty($users_id))
                                                    @if ($item->users_id == $users_id->id)
                                                        <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                        <a class="btn-text" href="/warung/{{$item->id}}/edit">Edit</a>
                                                        {{-- <a class="btn-text" href="/warung/{{$item->id}}/delete">Delete</a> --}}
                                                        <a class="btn-text" href="{{ url('') }}" type="submit" id="deleteWarung" data-id="{{$item->id}}" data-nama="{{$item->nama}}">Delete</a>
                                                    @else
                                                        <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                    @endif
                                                @else
                                                    <a class="btn-text" href="/warung/{{$item->id}}">Enter now </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @empty
                            <div class="col-12">
                                <h3 class="section-title px-5"><span class="px-2">Belum ada Toko yang Terdaftar!</span></h3>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <!-- Categories End -->

        <!-- Products Start -->
        <div class="text-center mt-5 mb-4">
            <h2 class="section-title px-5"><span class="px-2">Example Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @forelse ($barang as $item)
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
            @empty
                <div class="col-12">
                    <h3 class="section-title px-5"><span class="px-2">Belum ada Product!</span></h3>
                </div>
            @endforelse

        </div>
        <!-- Products End -->
@endsection
