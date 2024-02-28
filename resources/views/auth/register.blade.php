{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    {{-- @vite('resources/css/app/css') --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <div class="container-fluid my-3">
        <div class="container">
            <h1 class="text-center">MANIAC XIII</h1>
            <h1 class="text-center">REGISTRATION</h1>
            <div class="form my-5">
                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            {{-- <span class="input-group-text" id="inputGroupPrepend"> </span> --}}
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="username"
                                required placeholder="Masukkan Username">
                            @error('username')
                                <div class="invalid-feedback alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label">Password</label>
                        <div class="input-group has-validation">
                            {{-- <span class="input-group-text" id="inputGroupPrepend"> </span> --}}
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="validationCustomUsername" aria-describedby="inputGroupPrepend" required
                                name="password" placeholder="Masukkan Password">
                            @error('password')
                                <div class="invalid-feedback alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Nama Tim</label>
                        <input type="text" class="form-control @error('nama_tim') is-invalid @enderror"
                            id="validationCustom01" placeholder="Masukkan Nama Tim" required name="nama_tim">
                        @error('nama_tim')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control  @error('nama_sekolah') is-invalid @enderror"
                            id="validationCustom02" placeholder="Masukkan Nama Sekolah" required name="nama_sekolah">
                        @error('nama_sekolah')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Alamat Sekolah</label>
                        <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror"
                            id="validationCustom03" placeholder="Masukkan Alamat Sekolah" required
                            name="alamat_sekolah">
                        @error('alamat_sekolah')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nomor Telepon Sekolah</label>
                        <input type="text" class="form-control @error('nomor_sekolah') is-invalid @enderror"
                            id="validationCustom03" name="nomor_sekolah" required
                            placeholder="Masukkan Nomor Telepon Sekolah">
                        @error('nomor_sekolah')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr>
                    {{-- Leader --}}
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nama Ketua Tim</label>
                        <input type="text" class="form-control @error('nama_leader') is-invalid @enderror"
                            id="validationCustom03" required name="nama_leader">
                        @error('nama_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email_leader') is-invalid @enderror"
                            id="validationCustom03" required name="email_leader">
                        @error('email_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('nomor_leader') is-invalid @enderror"
                            id="validationCustom03" required name="nomor_leader">
                        @error('nomor_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Foto</label>
                        <input type="file" class="form-control @error('foto_leader') is-invalid @enderror"
                            id="validationCustom03" required name="foto_leader">
                        @error('foto_leader')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Alergi</label>
                        <input type="text" class="form-control" id="validationCustom03" name="alergi_leader">
                    </div>
                    <hr>
                    {{-- anggota 1 --}}
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nama Anggota 1</label>
                        <input type="text" class="form-control @error('nama_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="nama_anggota1">
                        @error('nama_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="email_anggota1">
                        @error('email_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('nomor_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="nomor_anggota1">
                        @error('nomor_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Foto</label>
                        <input type="file" class="form-control @error('foto_anggota1') is-invalid @enderror"
                            id="validationCustom03" required name="foto_anggota1">
                        @error('foto_anggota1')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Alergi</label>
                        <input type="text" class="form-control" id="validationCustom03">
                    </div>
                    <hr>
                    {{-- anggota 2 --}}
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nama Anggota 2</label>
                        <input type="text" class="form-control @error('nama_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="anggota2_nama">
                        @error('nama_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="email_anggota2">
                        @error('email_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Phone Number</label>
                        <input type="text" class="form-control @error('nomor_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="nomor_anggota2">
                        @error('nomor_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('foto_anggota2') is-invalid @enderror"
                            id="validationCustom03" required name="foto_anggota2">
                        @error('nomor_anggota2')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Alergi</label>
                        <input type="text" class="form-control" id="validationCustom03" name="alergi_anggota2">
                    </div>
                    <div class="col-12 my-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>
