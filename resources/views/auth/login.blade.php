@extends('visitor.welcome')

@section('styles')
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        label {
            text-shadow: 0px 0px 8px #e7eadf;
            font-weight: 600;
        }

        body>div {
            /* background-image: url("{{ asset('asset2024/main/bg.png') }}"); */
            background-size: 101% 101%;
            background-position: center;
            background-repeat: no-repeat;
        }

        body>div>div>div {
            margin-bottom: 4.25rem;
        }

        .container {
            height: 100vh;
        }




        .txtPass {
            position: relative;
        }

        .togle-position {
            position: absolute;
            right: 5px;
            top: 55%;
            transform: translate(0, -50%);
        }

        .show-password path:nth-child(1),
        .show-password path:nth-child(3),
        .show-password path:nth-child(5),
        .show-password path:nth-child(7),
        .show-password path:nth-child(9),
        .show-password path:nth-child(11),
        .show-password path:nth-child(13),
        .show-password path:nth-child(15) {
            display: none;
        }

        .show-password path:nth-child(2),
        .show-password path:nth-child(4),
        .show-password path:nth-child(6),
        .show-password path:nth-child(8),
        .show-password path:nth-child(10),
        .show-password path:nth-child(12),
        .show-password path:nth-child(14),
        .show-password path:nth-child(16) {
            display: block;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('asset2024/main/maniac.png') }}" alt="logo-maniac" class="w-50">
            @if (session()->has('gagal'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('gagal') }}
                </div>
            @endif
            {{--            @error('gagal') --}}
            {{--                <div class="alert alert-success" role="alert"> --}}
            {{--                    {{ $message }} --}}
            {{--                </div> --}}
            {{--            @enderror --}}
            <div class="w-100 d-flex justify-content-center">
                <form method="POST" action="{{ route('login') }}" class="w-75">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="username" :value="__('Username')"><strong>Username</strong></label>
                        <input id="username"
                            class="block mt-1 d-block w-100 py-1 px-2 @error('username') is-invalid @enderror"
                            type="text" name="username" :value="old('username')" autofocus autocomplete="username" />
                        @error('username')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" :value="__('Password')"><strong>Password</strong></label>
                        <div class="input-group d-flex txtPass">
                            <input id="password" style="width: 100%" class="block mt-1 d-block py-1 px-2" type="password"
                                name="password" autocomplete="current-password" />
                            <svg style="width: 25px; height:auto;" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="togle-position eye-close" onclick="togglePasswordVisibility()">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <svg style="width: 25px; height:auto;" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="togle-position eye"
                                onclick="togglePasswordVisibility()">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>


                        @error('username')
                            <div class="invalid-feedback alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3 d-flex justify-content-end">
                        <!-- Forgot your password? -->
                        {{-- <div>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-decoration-none"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div> --}}

                        <!-- Button Log in -->
                        <button class="ms-3 btn-secondary btn text-white w-25">
                            {{ __('Log in') }}
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleReveal = document.querySelector('.eye');
            const toggleHidden = document.querySelector('.eye-close');

            if (passwordInput.getAttribute('type') === 'password') {
                passwordInput.setAttribute('type', 'text');
                toggleReveal.classList.add('show-password');
                toggleReveal.style.display('none');
            } else {
                passwordInput.setAttribute('type', 'password');
                toggleReveal.classList.remove('show-password');
            }
        }
    </script>
@endsection
