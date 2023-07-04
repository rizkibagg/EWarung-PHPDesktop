@extends('layout.master')

@section('dashboard')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Edit data</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{ $warung->nama }}</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <form action="/warung/{{ $warung->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row mt-3 mb-3">
                    <label for="fotowarung" class="col-md-4 col-lg-3 col-form-label">Foto Warung</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="fotowarung" type="file" class="form-control-file" id="fotowarung">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="namawarung" class="col-md-4 col-lg-3 col-form-label">Nama Warung</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="namawarung" value="{{ $warung->nama }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nomorhpwarung" class="col-md-4 col-lg-3 col-form-label">No. Hp</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="nomorhp" type="text" class="form-control" id="nomorhpwarung" value="{{ $warung->nomorhp }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamatwarung" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="alamat" type="text" class="form-control" id="alamatwarung" value="{{ $warung->alamat }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="kodepos" class="col-md-4 col-lg-3 col-form-label">Kode Pos</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="kodepos" type="text" class="form-control" id="kodepos" value="{{ $warung->kodepos }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="biodatawarung" class="col-md-4 col-lg-3 col-form-label">Biodata</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea name="biodata" class="form-control" id="biodatawarung" style="height: 100px">{{ $warung->biodata }}</textarea>
                    </div>
                </div>

                {{-- Untuk memanggil User id --}}
                <div class="form-group">
                    <input type="hidden" name="users_id" class="form-control" value="{{ $warung->user->id }}">
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form><!-- End Create Shop Edit Form -->
        </div>
    </div>
@endsection
