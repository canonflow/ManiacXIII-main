<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
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

        label {
            color: white;
        }

        @media screen and (min-width : 1344px) {
            form {
                min-width: 50%;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-body-secondary">
        <div class="container">
            <div class="title d-flex justify-content-center w-100">
                <img class="w-50" src="{{ asset('asset2024/main/maniac.png') }}" alt="logo-maniac">
            </div>
            <div class="form my-5 w-75 container">
                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label text-dark">Username</label>
                        <div class="input-group has-validation">
                            {{-- <span class="input-group-text" id="inputGroupPrepend"> </span> --}}
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="username"
                                required placeholder="ex: someone" value="{{ old('username') ?? '' }}" />
                            @error('username')
                                <div class="invalid-feedback alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label text-dark">Password</label>
                        <div class="input-group has-validation">
                            {{-- <span class="input-group-text" id="inputGroupPrepend"> </span> --}}
                            <input type="password" class="form-control d-block @error('password') is-invalid @enderror"
                                id="validationCustomUsername" aria-describedby="inputGroupPrepend" required
                                name="password" />
                            @error('password')
                                <div class="invalid-feedback alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-danger mt-1">
                            *) Minimal 8 Karakter
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label text-dark">Nama Tim</label>
                        <input type="text" class="form-control @error('nama_tim') is-invalid @enderror"
                            id="validationCustom01" placeholder="ex: 123" required name="nama_tim"
                            value="{{ old('nama_tim') }}" />
                        @error('nama_tim')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label text-dark">Nama Sekolah</label>
                        <input type="text" class="form-control  @error('nama_sekolah') is-invalid @enderror"
                            id="validationCustom02" placeholder="ex: UBAYA" required name="nama_sekolah"
                            value="{{ old('nama_sekolah') }}">
                        @error('nama_sekolah')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Alamat Sekolah</label>
                        <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror"
                            id="validationCustom03"
                            placeholder="ex: Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur"
                            required name="alamat_sekolah" value="{{ old('alamat_sekolah') }}" />
                        @error('alamat_sekolah')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Nomor Telepon Sekolah</label>
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
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Nama Ketua Tim</label>
                        <input type="text" class="form-control @error('nama_leader') is-invalid @enderror"
                            id="validationCustom03" placeholder="ex: someone1" required name="nama_leader"
                            value="{{ old('nama_leader') }}">
                        @error('nama_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Email</label>
                        <input type="text" class="form-control @error('email_leader') is-invalid @enderror"
                            id="validationCustom03" required placeholder="ex: someone1@gmail.com" name="email_leader"
                            value="{{ old('email_leader') }}" />
                        @error('email_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Nomor Telepon</label>
                        <input type="text" class="form-control @error('nomor_leader') is-invalid @enderror"
                            id="validationCustom03" placeholder="ex: +62123456789" required name="nomor_leader"
                            value="{{ old('nomor_leader') }}">
                        @error('nomor_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Foto</label>
                        <input type="file" class="form-control @error('foto_leader') is-invalid @enderror"
                            id="validationCustom03" required name="foto_leader"
                            accept="image/png, image/jpeg, image/jpg" />
                        @error('foto_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Alergi</label>
                        <input type="text" class="form-control" id="validationCustom03" name="alergi_leader"
                            value="{{ old('alergi_leader') }}">
                    </div>
                    <div class="information mt-2">
                        *) Berikan tanda - jika tidak ada
                    </div>
                    <hr>
                    {{-- anggota 1 --}}
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Nama Anggota 1</label>
                        <input type="text" class="form-control @error('nama_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="nama_anggota1" placeholder="ex: someone2"
                            value="{{ old('nama_anggota1') }}">
                        @error('nama_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Email</label>
                        <input type="text" class="form-control @error('email_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="email_anggota1"
                            placeholder="ex: someone2@gmail.com" value="{{ old('email_anggota1') }}">
                        @error('email_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Nomor Telepon</label>
                        <input type="text" class="form-control @error('nomor_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="nomor_anggota1" placeholder="ex: +62123456789"
                            value="{{ old('nomor_anggota1') }}">
                        @error('nomor_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Foto</label>
                        <input type="file" class="form-control @error('foto_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="foto_anggota1">
                        @error('foto_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Alergi</label>
                        <input type="text" class="form-control" id="validationCustom03" name="alergi_anggota1"
                            value="{{ old('alergi_anggota1') }}">
                    </div>
                    <div class="information mt-2">
                        *) Berikan tanda - jika tidak ada
                    </div>
                    <hr>
                    {{-- anggota 2 --}}
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Nama Anggota 2</label>
                        <input type="text" class="form-control @error('nama_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="nama_anggota2" placeholder="ex: someone3"
                            value="{{ old('nama_anggota2') }}">
                        @error('nama_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Email</label>
                        <input type="text" class="form-control @error('email_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="email_anggota2"
                            value="{{ old('email_anggota2') }}" placeholder="someone3@gmail.com">
                        @error('email_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Phone Number</label>
                        <input type="text" class="form-control @error('nomor_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="nomor_anggota2" placeholder="ex: +62123456789"
                            value="{{ old('nomor_anggota2') }}">
                        @error('nomor_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Photo</label>
                        <input type="file" class="form-control @error('foto_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="foto_anggota2">
                        @error('nomor_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label text-dark">Alergi</label>
                        <input type="text" class="form-control" id="validationCustom03" name="alergi_anggota2"
                            value="{{ old('alergi_anggota2') }}">
                    </div>
                    <div class="information mt-2">
                        *) Berikan tanda - jika tidak ada
                    </div>
                    <div class="col-12s mb-3 text-end">
                        <button class="btn btn-primary fs-5 w-25" type="submit">Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>
