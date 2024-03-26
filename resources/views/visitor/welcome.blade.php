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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .dropDownMenu {
            z-index: 1000;
            display: block;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo flex gap-2">
                <img src="{{ asset('../asset2024/logo-ubaya.png') }}" alt="logo-ubaya" class="icon">
                <img src="{{ asset('../asset2024/logo-maniac.jpg') }}" alt="logo-maniac" class="icon">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('visitor.about') }}">ABOUT US <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('visitor.faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('visitor.gallery') }}">Gallery</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="account-dropdown"
                                data-bs-toggle="dropdown"> ACCOUNT</button>
                        </div>
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
                                    <a href="{{ url($endpoint) }}" class="dropdown-item text-danger"></a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" class="dropdown-item text-danger">LOGIN</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="dropdown-item text-danger">REGISTER</a>
                                    </li>
                                @endif
                            </ul>
                        @endauth
                </ul>
            </div>
        </nav>
    @endif
    <main>
        @yield('content')

    </main>

    <footer class="footer p-10 bg-base-300 text-base-content">
        <nav class="col">
            <h5 class="text-white font-bold">MANIAC XII</h5>
            <a class="link link-hover">Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur</a>
            <div class="maps">
                <iframe class="w-100 md:w-50"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3031802459786!2d112.76553161057895!3d-7.319800892657786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae3f29c4665%3A0x7536c23b4453a79!2sUniversity%20of%20Surabaya!5e0!3m2!1sen!2sid!4v1709278257216!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </nav>
        <nav>
            <h6 class="text-white font-bold">SOCIAL</h6>
            <div class="grid gap-4">
                <p class="text-xl">
                    <i class="fa-brands fa-square-instagram"></i>
                    @maniac_ubaya
                </p>
                <p class="text-xl">
                    <i class="fa-brands fa-line"></i>
                    @994nxsfr
                </p>
                <p class="text-xl">
                    <i class="fa-solid fa-envelope"></i> maniac.ubayaa@gmail.com
                </p>
            </div>
        </nav>
        <nav>
            <h6 class="text-white font-bold">SPONSORED BY</h6>

        </nav>

        <p>&#169; 2024 MANIAC XIII </p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const dropDownClick = document.getElementById('dropdown');
        const dropDownMenu = document.getElementById('dropDownMenu');
        $(dropDownClick).click(function(e) {
            e.preventDefault();
            $(dropDownMenu).addClass('dropDownMenu');
        });
    </script>



</body>


</html>
