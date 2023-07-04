@extends('layout.master')

@section('dashboard')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Profile</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Profile</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                @if (Auth::user()->kategori == 'Penjual')
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('temlogin/img/min.png') }}" alt="Profile">
                            <h2>
                                Warung
                            </h2>
                            <h3>
                                @if (Auth::user() === null || Auth::user() === "")
                                    Pemilik : -
                                @else
                                    Pemilik : {{ Auth::user()->nama }}
                                @endif
                            </h3>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('temlogin/img/min.png') }}" alt="Profile">
                            <h3>
                                @if (Auth::user() === null || Auth::user() === "")
                                    -
                                @else
                                    {{ Auth::user()->nama }}
                                @endif
                            </h3>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-overview-tab" data-toggle="tab" href="#nav-overview" role="tab" aria-controls="nav-overview" aria-selected="true">Overview</a>
                            <a class="nav-item nav-link" id="nav-editprofile-tab" data-toggle="tab" href="#nav-editprofile" role="tab" aria-controls="nav-editprofile" aria-selected="false">Edit Profile</a>
                            @if ( Auth::user()->kategori == 'Penjual')
                                <a class="nav-item nav-link" id="nav-createshop-tab" data-toggle="tab" href="#nav-createshop" role="tab" aria-controls="nav-createshop" aria-selected="false">Create Shop</a>
                            @endif
                            <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">Change Password</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                            <h5 class="card-title">Biodata</h5>
                            <p class="small fst-italic">{{ $profile->biodata }}</p>

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->user->nama }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Username</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->user->username }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->user->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">No. Hp</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->nomorhp }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->alamat }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->pekerjaan }}</div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="nav-editprofile" role="tabpanel" aria-labelledby="nav-editprofile-tab">
                            <!-- Profile Edit Form -->
                            <form action="/profile/{{$profile->id}}" method="POST">
                                @csrf
                                @method('put')

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email" value="{{ $profile->user->email }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control" id="nama" value="{{ $profile->user->nama }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="username" type="text" class="form-control" id="username" value="{{ $profile->user->username }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nomorhp" class="col-md-4 col-lg-3 col-form-label">No. Hp</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nomorhp" type="text" class="form-control" id="nomorhp" value="{{ $profile->nomorhp }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat" type="text" class="form-control" id="alamat" value="{{ $profile->alamat }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="pekerjaan" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" value="{{ $profile->pekerjaan }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="biodata" class="col-md-4 col-lg-3 col-form-label">Biodata</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="biodata" class="form-control" id="biodata" style="height: 100px" required>{{ $profile->biodata }}</textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->
                        </div>
                        <div class="tab-pane fade" id="nav-createshop" role="tabpanel" aria-labelledby="nav-createshop-tab">
                            <!-- Create Shop Edit Form -->
                            <form action="/warung" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="fotowarung" class="col-md-4 col-lg-3 col-form-label">Foto Warung</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="fotowarung" type="file" class="form-control-file" id="fotowarung" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="namawarung" class="col-md-4 col-lg-3 col-form-label">Nama Warung</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control" id="namawarung" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nomorhpwarung" class="col-md-4 col-lg-3 col-form-label">No. Hp</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nomorhp" type="text" class="form-control" id="nomorhpwarung" value="{{ $profile->nomorhp }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamatwarung" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat" type="text" class="form-control" id="alamatwarung" value="{{ $profile->alamat }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kodepos" class="col-md-4 col-lg-3 col-form-label">Kode Pos</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="kodepos" type="text" class="form-control" id="kodepos" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="biodatawarung" class="col-md-4 col-lg-3 col-form-label">Biodata</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="biodata" class="form-control" id="biodatawarung" style="height: 100px" required></textarea>
                                    </div>
                                </div>

                                {{-- Untuk memanggil User id --}}
                                <div class="form-group">
                                    <input type="hidden" name="users_id" class="form-control" value="{{ $profile->user->id }}">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Create Shop Edit Form -->
                        </div>
                        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <!-- Change Password Form -->
                            <form>

                                <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="password" type="password" class="form-control" id="currentPassword">
                                </div>
                                </div>

                                <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                                </div>
                                </div>

                                <div class="row mb-3">
                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                </div>
                                </div>

                                <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
