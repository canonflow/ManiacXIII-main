@extends('visitor.welcome')

@section('styles')
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;

        }

        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        hr {
            color: white;
            border: 1px solid;
        }

        .mount {
            width: 500px;
            bottom: 0px;
            left: 0px;
            z-index: 0;
        }

        .label-stroke {
            /*text-shadow: 0px 0px 8px #e7eadf;*/
            font-weight: bolder;
        }

        .container-fluid {
            background-color: transparent;
        }

        body {
            background-color: #e7eadf !important;
        }

        @media screen and (min-width : 1344px) {
            form {
                min-width: 50%;
            }
        }

        @keyframes moveCloud {
            0% {
                transform: translateX(0)
            }

            50% {
                transform: translateX(100px);
            }

            100% {
                transform: translateX(-100px);
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl position-relative">
        <div class="title d-flex justify-content-center w-100 py-2 position-relative">
            <img class="w-50 z-1" src="{{ asset('asset2024/main/maniac.png') }}" alt="logo-maniac">
            <img class="position-absolute clouds" style="width: 500px; height: 200px; top: 100px; right: 20px;"
                src="{{ asset('asset2024/main/cloud.png') }}" alt="">

        </div>
        <div class="my-5 w-75 container position-relative">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustomUsername" class="form-label text-dark label-stroke">Username</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" name="username" required placeholder="ex: someone"
                            value="{{ old('username') ?? '' }}" />
                        @error('username')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-danger mt-1" id="passwordCriteriaMessage">
                        *) Minimal 8 Karakter dan Maximal 15 Karakter
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <label for="validationCustomUsername" class="form-label text-dark label-stroke">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" id="validationCustomUsername"
                            class="form-control d-block @error('password') is-invalid @enderror"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="password" />
                        @error('password')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-danger mt-1" id="passwordCriteriaMessage">
                        *) Minimal 8 Karakter
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom01" class="form-label text-dark label-stroke">Nama Tim</label>
                    <input type="text" class="form-control @error('nama_tim') is-invalid @enderror"
                        id="validationCustom01" placeholder="ex: Tim Maniac" required name="nama_tim"
                        value="{{ old('nama_tim') }}" />
                    @error('nama_tim')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="text-danger mt-1" id="passwordCriteriaMessage">
                        *) Maximal 15 Karakter (termasuk spasi)
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom02" class="form-label text-dark label-stroke">Nama Sekolah</label>
                    <input type="text" class="form-control  @error('nama_sekolah') is-invalid @enderror"
                        id="validationCustom02" placeholder="ex: UBAYA" required name="nama_sekolah"
                        value="{{ old('nama_sekolah') }}">
                    @error('nama_sekolah')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Alamat Sekolah</label>
                    <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror"
                        id="validationCustom03"
                        placeholder="ex: Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur" required
                        name="alamat_sekolah" value="{{ old('alamat_sekolah') }}" />
                    @error('alamat_sekolah')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Nomor Telepon
                        Sekolah</label>
                    <input type="text" class="form-control @error('nomor_sekolah') is-invalid @enderror"
                        id="validationCustom03" name="nomor_sekolah" required placeholder="ex: +62123456789"
                        value="{{ old('nomor_sekolah') }}" />
                    @error('nomor_sekolah')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <hr>
                {{-- Leader --}}
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Nama Ketua Tim</label>
                    <input type="text" class="form-control @error('nama_leader') is-invalid @enderror"
                        id="validationCustom03" placeholder="ex: someone1" required name="nama_leader"
                        value="{{ old('nama_leader') }}">
                    @error('nama_leader')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Email</label>
                    <input type="text" class="form-control @error('email_leader') is-invalid @enderror"
                        id="validationCustom03" required placeholder="ex: someone1@gmail.com" name="email_leader"
                        value="{{ old('email_leader') }}" />
                    @error('email_leader')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Nomor Telepon</label>
                    <input type="text" class="form-control @error('nomor_leader') is-invalid @enderror"
                        id="validationCustom03" placeholder="ex: +62123456789" required name="nomor_leader"
                        value="{{ old('nomor_leader') }}">
                    @error('nomor_leader')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Foto</label>
                    <input type="file" class="form-control @error('foto_leader') is-invalid @enderror"
                        id="validationCustom03" required name="foto_leader" accept="image/png, image/jpeg, image/jpg" />
                    @error('foto_leader')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Alergi</label>
                    <input type="text" class="form-control" id="validationCustom03" name="alergi_leader"
                        value="{{ old('alergi_leader') }}" placeholder="Berikan tanda - jika tidak ada">
                </div>
{{--                <div class="information mt-2 fw-bold">--}}
{{--                    *) Berikan tanda - jika tidak ada--}}
{{--                </div>--}}
                <hr>
                {{-- anggota 1 --}}
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Nama Anggota 1</label>
                    <input type="text" class="form-control @error('nama_anggota1') is-invalid @enderror"
                        id="validationCustom03" required name="nama_anggota1" placeholder="ex: someone2"
                        value="{{ old('nama_anggota1') }}">
                    @error('nama_anggota1')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Email</label>
                    <input type="text" class="form-control @error('email_anggota1') is-invalid @enderror"
                        id="validationCustom03" required name="email_anggota1" placeholder="ex: someone2@gmail.com"
                        value="{{ old('email_anggota1') }}">
                    @error('email_anggota1')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Nomor Telepon</label>
                    <input type="text" class="form-control @error('nomor_anggota1') is-invalid @enderror"
                        id="validationCustom03" required name="nomor_anggota1" placeholder="ex: +62123456789"
                        value="{{ old('nomor_anggota1') }}">
                    @error('nomor_anggota1')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Foto</label>
                    <input type="file" class="form-control @error('foto_anggota1') is-invalid @enderror"
                        id="validationCustom03" required name="foto_anggota1">
                    @error('foto_anggota1')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Alergi</label>
                    <input type="text" class="form-control" id="validationCustom03" name="alergi_anggota1"
                        value="{{ old('alergi_anggota1') }}" placeholder="Berikan tanda - jika tidak ada!">
                </div>
{{--                <div class="information mt-2 fw-bold">--}}
{{--                    *) Berikan tanda - jika tidak ada--}}
{{--                </div>--}}
                <hr>
                {{-- anggota 2 --}}
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Nama Anggota 2</label>
                    <input type="text" class="form-control @error('nama_anggota2') is-invalid @enderror"
                        id="validationCustom03" required name="nama_anggota2" placeholder="ex: someone3"
                        value="{{ old('nama_anggota2') }}">
                    @error('nama_anggota2')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Email</label>
                    <input type="text" class="form-control @error('email_anggota2') is-invalid @enderror"
                        id="validationCustom03" required name="email_anggota2" value="{{ old('email_anggota2') }}"
                        placeholder="someone3@gmail.com">
                    @error('email_anggota2')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Phone Number</label>
                    <input type="text" class="form-control @error('nomor_anggota2') is-invalid @enderror"
                        id="validationCustom03" required name="nomor_anggota2" placeholder="ex: +62123456789"
                        value="{{ old('nomor_anggota2') }}">
                    @error('nomor_anggota2')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 col-lg-6">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Photo</label>
                    <input type="file" class="form-control @error('foto_anggota2') is-invalid @enderror"
                        id="validationCustom03" required name="foto_anggota2">
                    @error('nomor_anggota2')
                        <div class="invalid-feedback alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label text-dark label-stroke">Alergi</label>
                    <input type="text" class="form-control" id="validationCustom03" name="alergi_anggota2"
                        value="{{ old('alergi_anggota2') }}" placeholder="Berikan tanda - jika tidak ada!">
                </div>
{{--                <div class="information mt-2 fw-bold text-white">--}}
{{--                    *) Berikan tanda - jika tidak ada--}}
{{--                </div>--}}
                <div class="col-12s mb-3 text-end">
                    {{-- <button class="btn btn-primary fs-5 w-25" type="button" data-bs-target="#confirmationModal"
                        data-bs-toggle="modal" id="registerButton">Register</button> --}}
                    <button type="button" class="btn-register btn btn-primary fs-5 w-25" data-bs-toggle="modal"
                        data-bs-target="#confirmationModal">
                        Register
                    </button>
                    <div class="modal fade" id="confirmationModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">KONFIMRASI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Data yang telah dikumpulkan tidak dapat diubah lagi. Apakah anda yakin untuk
                                    mengumpulkan ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-primary">KUMPUL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
