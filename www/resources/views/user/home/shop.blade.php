@extends('layout.master')

@section('dashboard')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">registered shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Warung</p>
            </div>
        </div>
    </div>
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
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @forelse ($warung as $item)
                @if (!empty($users_id))
                    @if ($item->users_id == $users_id->id)
                        <div class="col-lg-4 col-md-6 pb-1 mt-3">
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
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 pb-1 mt-3">
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
                        </div>
                    @endif
                @else
                    <div class="col-lg-4 col-md-6 pb-1 mt-3">
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
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <h3 class="section-title px-5"><span class="px-2">Belum ada Toko yang Terdaftar!</span></h3>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Categories End -->
@endsection
