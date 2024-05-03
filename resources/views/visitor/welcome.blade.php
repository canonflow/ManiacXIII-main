<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MANIAC XIII</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.png" type="image/png">


    <style>
        /* Font cinzel */
        @font-face {
            font-family: 'cinzel';
            src: url("../fonts/cinzel/Cinzel-Regular.ttf") format('truetype');
            font-weight: 100;
        }
        
        @font-face {
            font-family: 'cinzel';
            src: url("../fonts/cinzel/Cinzel-Medium.ttf") format('truetype');
            font-weight: 300;
        }
        
        @font-face {
            font-family: 'cinzel';
            src: url("../fonts/cinzel/Cinzel-SemiBold.ttf") format('truetype');
            font-weight: 500;
        }
        
        @font-face {
            font-family: 'cinzel';
            src: url("../fonts/cinzel/Cinzel-Bold.ttf") format('truetype');
            font-weight: 700;
        }
        
        @font-face {
            font-family: 'cinzel';
            src: url("../fonts/cinzel/Cinzel-ExtraBold.ttf") format('truetype');
            font-weight: 800;
        }

        @font-face {
            font-family: 'cinzel';
            src: url("../fonts/cinzel/Cinzel-Black.ttf") format('truetype');
            font-weight: 900;
        }
        /* Font cinzel */

        @font-face {
            font-family: 'viking';
            src: url("../fonts/viking/pr-viking.ttf") format('truetype');
        }

        @font-face {
            font-family: 'Montserrat';
            src: url("../fonts/montserrat/Montserrat-Regular.otf") format("otf");
        }

        .dropDownMenu {
            z-index: 1000;
            display: block;
        }

        .navbar {
            background-color: #620706 !important;
        }

        .btn-account {
            background-color: #620706;
        }

        .bg-red {
            background-color: #620706 !important;
        }

        body {
            background-image: url("{{ asset('asset2024/bg-home.png') }}") !important;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
        }

        .container-bottom-home{
            padding-top: 44%; /* Kasih responsive ini berhubungan dengan .buttom-web-home */
            align-items: start;
        }

        .bottom-web-home{
            bottom: 0%;
            width: 100%;
            z-index: -1;
            /*height: 42.3%; !* Kasih Responsive*!*/
            /*object-fit: cover;*/
        }
    </style>
    @yield('styles')

    {{--    @vite('resources/css/app.css') --}}
</head>

<body class="antialiased overflow-x-hidden">
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between px-3">
            <div class="logo">
                <img src="{{ asset('../asset2024/logo-ubaya.png') }}" alt="logo-ubaya" class="icon">
                <img src="{{ asset('../asset2024/logo-maniac.jpg') }}" alt="logo-maniac" class="icon">
            </div>
            <div class="link pe-3  ">
                <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link text-white" href="{{ route('index') }}">HOME</a>
                            <a class="nav-link text-white" href="{{ route('visitor.about') }}">ABOUT US <span
                                    class="sr-only">(current)</span></a>
                            <a class="nav-link text-white" href="{{ route('visitor.competition') }}">COMPETITION</a>
                            <a class="nav-link text-white" href="{{ route('visitor.faq') }}">FAQ</a>
                            <div class="dropdown">
                                <button class="btn btn-account dropdown-toggle text-white" type="button"
                                    id="account-dropdown" data-bs-toggle="dropdown">ACCOUNT</button>
                                <ul class="dropdown-menu" aria-labelledby="account-dropdown">
                                    @auth
                                        @php
                                            $endpoint = '';
                                            switch (\Illuminate\Support\Facades\Auth::user()->role) {
                                                case 'participant':
                                                    $endpoint = '/team';
                                                    break;
                                                case 'acara':
                                                    $endpoint = '/acara';
                                                    break;
                                                case 'si':
                                                    $endpoint = '/si';
                                                    break;
                                                case 'supersi':
                                                    $endpoint = '/supersi';
                                                    break;
                                                case 'admin':
                                                    $endpoint = '/admin';
                                                    break;
                                                case 'judge':
                                                    $endpoint = '/judge';
                                                    break;
                                                default:
                                                    $endpoint = '/penpos';
                                                    break;
                                            }
                                        @endphp
                                        <li>
                                            <a href="{{ url($endpoint) }}"
                                                style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                class="dropdown-item text-danger">Dashboard</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" id="logout">
                                                @csrf
                                                <button class="btn-logout dropdown-item text-danger"
                                                    style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                    type="submit">Logout</button>
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('login') }}" class="dropdown-item text-danger">LOGIN</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}"
                                                    class="dropdown-item text-danger">REGISTER</a>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
    @endif
    <main class="position-relative">
        @yield('content')
{{--        <img src="{{ asset('asset2024') }}/bg-home-bawah.png" alt="" id="bgBawah">--}}
        <div class="container-bottom-home z-0 d-flex justify-content-center">
            <img src="{{ asset('asset2024/bg-home-bawah.png') }}"  class="bottom-web-home position-absolute">
        </div>
    </main>
    <footer class="bg-red d-flex row py-4 position-relative">
        <div class="col-lg-5 px-4">
            <h3 class="text-white">MANIAC XIII</h3>
            <a class="link link-hover text-white">Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa
                Timur</a>
            <div class="maps py-3">
                <iframe class="w-75 w-sm-25"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3031802459786!2d112.76553161057895!3d-7.319800892657786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae3f29c4665%3A0x7536c23b4453a79!2sUniversity%20of%20Surabaya!5e0!3m2!1sen!2sid!4v1709278257216!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-lg-5">
            <h4 class="text-white font-bold">SOCIAL MEDIA</h4>
            <div class="grid gap-4">
                <p class="text-white">
                    <i class="fa-brands fa-square-instagram"></i>
                    @maniac_ubaya
                </p>
                <p class="text-white">
                    <i class="fa-brands fa-line"></i>
                    @994nxsfr
                </p>
                <p class="text-white">
                    <i class="fa-solid fa-envelope"></i> maniac.ubayaa@gmail.com
                </p>
            </div>
        </div>
        <div class="col-lg-2">
            <h6 class="text-white font-bold">SPONSORED BY</h6>

        </div>
        <p class="text-white text-end pe-5">&#169; 2024 MANIAC XIII </p>

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}
</body>


</html>
