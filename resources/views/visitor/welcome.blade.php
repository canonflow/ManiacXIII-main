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

    {{-- aos --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    {{-- <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.png" type="image/png"> --}}

    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.ico" type="image/x-icon">

    <style>
        body {
            cursor: url("{{ asset('asset2024') }}/cursor/CURSOR.cur"),
                url("{{ asset('asset2024') }}/cursor/CURSOR.svg"),
                url("{{ asset('asset2024') }}/cursor/CURSOR.png"), auto;
        }

        button:hover,
        a:hover,
        li:hover {
            cursor: url("{{ asset('asset2024') }}/cursor/shield.svg"),
                url("{{ asset('asset2024') }}/cursor/shield.png"), pointer !important;
        }

        input:hover {
            cursor: url("{{ asset('asset2024') }}/cursor/sword.svg"),
                url("{{ asset('asset2024') }}/cursor/sword.png"), text !important;
        }

        #navbarNav {
            justify-content: end;
        }

        body {
            background-image: url("{{ asset('asset2024/bg-home.png') }}") !important;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
        }

        p {
            font-family: 'Montserrat';
        }

        .container-fluid {
            background-color: transparent;
        }

        .dropDownMenu {
            z-index: 1000;
            display: block;
        }

        .navbar {
            background-color: #620706 !important;
        }

        .bg-red {
            background-color: #620706 !important;
        }

        .container-bottom-home {
            position: absolute;
            bottom: 100px;
        }

        .bottom-web-home {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: -1;
        }

        .dropdown-item,
        .nav-link {
            font-weight: 600;
            font-family: "Montserrat";
        }

        .navbar-nav {
            gap: 8px;

        }

        .icon {
            width: 20px;
            height: auto;
        }

        .sosmedLink {
            text-decoration: none;
            font-size: 1.05rem;
            /*color: #E7EADF;*/
            /*transition: all 0.3s ease-in-out;*/
        }

        .sosmedLink:hover {
            font-weight: bolder;
        }

        .container-logo-kristin {
            width: 170px;
            height: auto;
            background-color: rgba(210, 210, 210, 0.9);
            border-radius: 20px;
        }
    </style>
    @yield('styles')

</head>

<body class="antialiased overflow-x-hidden">
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid" style="padding-inline: 2rem;">
                <div class="logo">
                    <img src="{{ asset('asset2024/logo-maniac.jpg') }}" width="50px" height="50px" alt="logo-maniac"
                        style="border-radius: 50%;">
                    <img src="{{ asset('asset2024/logo-ubaya.png') }}" width="50px" height="50px" alt="logo-ubaya"
                        style="border-radius: 50%;">
                </div>

                <!-- Toggle button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list text-white" style="transform: scale(1.2)" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse ms-auto" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('index') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.about') }}">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.competition') }}">COMPETITION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.faq') }}">FAQ</a>
                        </li>
                        <li>
                            {{-- <a class="nav-link" href="{{ asset('asset2024/main/guidebook.pdf') }}"
                                download="Guidebook MANIAC XIII.pdf">GUIDEBOOK</a> --}}
                            <a class="nav-link" href="https://bit.ly/guidebookMANIACXIII" target="_blank">GUIDEBOOK</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button style="background-color: #7f4c42;"
                                    class="btn btn-secondary nav-link dropdown-toggle text-center" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong>
                                        {{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" --}}
                                        {{--                                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"> --}}
                                        {{--                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" /> --}}
                                        {{--                                            <path fill-rule="evenodd" --}}
                                        {{--                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" /> --}}
                                        {{--                                        </svg>&nbsp; --}}
                                        ACCOUNT
                                    </strong>
                                </button>
                                <ul class="dropdown-menu">
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
                                                class="dropdown-item text-white">Dashboard</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" id="logout">
                                                @csrf
                                                <button class="btn-logout dropdown-item text-white"
                                                    style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                    type="submit">Logout</button>
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('login') }}" class="dropdown-item text-white">LOGIN</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}"
                                                    class="dropdown-item text-white">REGISTER</a>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Offcanvas menu -->
        <div class="offcanvas offcanvas-start bg-red" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title text-white" id="offcanvasNavbarLabel" style="font-family: 'cinzel'">MANIAC
                    XIII</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Offcanvas menu links -->
                <ul class="navbar-nav">
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">HOME</a>
                    </li>
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link" href="{{ route('visitor.about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link" href="{{ route('visitor.competition') }}">COMPETITION</a>
                    </li>
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link" href="{{ route('visitor.faq') }}">FAQ</a>
                    </li>
                    <li>
                        <a class="nav-link text-white offcanvas-item"
                            href="{{ asset('asset2024/main/guidebook.pdf') }}"
                            download="Guidebook MANIAC XIII.pdf">GUIDEBOOK</a>

                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white offcanvas-item" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #7f4c42;">
                                ACCOUNT
                            </button>
                            <ul class="dropdown-menu btn-secondary">
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
                                            class="dropdown-item text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" id="logout">
                                            @csrf
                                            <button class="btn-logout dropdown-item text-white"
                                                style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                type="submit">Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" class="dropdown-item text-white">LOGIN</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}"
                                                class="dropdown-item text-white">REGISTER</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    @endif
    <main class="position-relative">
        @yield('content')
        <span class="d-block" style="height: 7rem;"></span>
        <img src="{{ asset('asset2024/bg-home-bawah.png') }}" class="bottom-web-home position-absolute">
    </main>

    <footer class="w-100 bg-red pt-2">
        <div class="container-fluid px-4 py-4">
            <div class="row">
                <div class="col-lg-6 col-sm-12 pe-3 pb-5">
                    <h3 class="text-white d-block" style="font-family: 'cinzel';">MANIAC XIII</h3>
                    <p class="text-white text-justify"><strong>MANIAC (Multimedia ANd Interactive Art Competition)
                        </strong> adalah lomba
                        berbasis multimedia untuk anak SMA/K sederajat yang mencakup game concept design dan game asset
                        design, yang diselenggarakan oleh jurusan Teknik Informatika Program Digital Media Technology
                        Universitas Surabaya.</p>
                    <img src="{{ asset('asset2024/footer/logo-maniac.png') }}" width="150px" height="auto"
                        alt="logo-maniac" class="pt-3">
                    <img src="{{ asset('asset2024/footer/logo-ubaya.png') }}" width="150px" height="auto"
                        alt="logo-ubaya" class="pt-3">
                </div>
                <div class="col-lg-6 ps-lg-5 pt-sm-2">
                    <h5 class="text-white"><strong>SOCIAL MEDIA</strong></h5>
                    <div class="grid gap-4">
                        <div class="text-white d-flex align-items-center">
                            <img class="icon" src="{{ asset('asset2024/footer/IG.png') }}" alt="instagram">
                            <a class="mb-0 sosmedLink text-white"
                                href="https://www.instagram.com/maniac_ubaya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                target="_blank" rel="noopener">
                                &nbsp;@maniac_ubaya
                            </a>
                        </div>
                        <br><br><br>
                        <h5 class="text-white"><strong>CONTACT US</strong></h5>
                        <div class="d-flex flex-column">
                            <a class="text-white pb-2 sosmedLink" href="https://line.me/R/ti/p/%40994nxsfr"
                                target="_blank" rel="noopener">
                                <img class="icon" src="{{ asset('asset2024/footer/line.png') }}" alt="line">
                                @994nxsfr
                            </a>
                            <a class="text-white pb-2 sosmedLink" href="mailto:maniac.ubayaa@gmail.com"
                                target="_blank" rel="noopener">
                                <img class="icon" src="{{ asset('asset2024/footer/email.png') }}" alt="email">
                                @maniac.ubayaa@gmail.com
                            </a>
                            <a class="text-white pb-2 sosmedLink" href="https://wa.me/+6285951465290" target="_blank"
                                rel="noopener" style="font-size: 1rem;">
                                <img class="icon" src="{{ asset('asset2024/footer/whatsapp.png') }}"
                                    alt="whatsapp">
                                085951465290 (Caitlyn)
                            </a>
                            <a class="text-white pb-2 sosmedLink" href="https://wa.me/+6285104914848" target="_blank"
                                rel="noopener" style="font-size: 1rem;">
                                <img class="icon" src="{{ asset('asset2024/footer/whatsapp.png') }}"
                                    alt="whatsapp">
                                085104914848 (Fiorello)
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-sm-2 mt-5">
                    <h5 class="text-white"><strong>SPONSORED BY</strong></h5>
                    <div class="container-logo-kristin d-flex justify-content-center align-items-center">
                        <img src="{{ asset('asset2024/footer/logo2_Kristin.png') }}" width="150px" height="auto" alt="logo-ubaya" class="pt-2 pb-2" alt="logo-kristin">
                    </div>
                </div>
                <br>
                <br>
                {{--                <p class="text-white text-start pe-5 pb-2 pt-5">COPYRIGHT &#169; MANIAC XIII Committee, All Rights --}}
                {{--                    Reserved</p> --}}
                <p class="text-white text-start pe-5 pb-2 pt-5">COPYRIGHT &copy; MANIAC XIII Information System, All
                    Rights Reserved</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('script')
</body>


</html>
