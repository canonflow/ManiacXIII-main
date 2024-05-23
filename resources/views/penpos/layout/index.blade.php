<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | MANIAC XII</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <!-- Icons -->
    <!-- Page plugins -->

    {{-- Flowbite JS --}}
    <script src="{{ asset('js') }}/flowbite.min.js"></script>
    {{--  JQuery  --}}
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    {{--  Scroll Bar  --}}
    <style>
        * {
            scroll-behavior: smooth;
        }

        *::-webkit-scrollbar {
            width: 0.5rem;
        }

        *::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: oklch(var(--b3));
            width: 1px;
        }

        *::-webkit-scrollbar-thumb {
            background-color: oklch(var(--s));
            outline: 1px solid slategrey;
            border-radius: 0.8rem;
        }

        body {
            cursor: url("{{ asset('asset2024') }}/cursor/CURSOR.cur"),
            url("{{ asset('asset2024') }}/cursor/CURSOR.svg"),
            url("{{ asset('asset2024') }}/cursor/CURSOR.png"), auto;
        }


        .action:hover {
            color: white !important;
        }

        .divider {
            color: oklch(var(--s)) !important;
        }

        .divider::before, .divider::after {
            background-color: oklch(var(--b2)) !important;;
        }
    </style>
    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/datepicker.js', 'resources/js/swiper.js'])

    {{--  jQuery  --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    {{--  CDN  --}}
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    {{--  Notyf  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <!-- Custom CSS -->
    @yield('styles')
</head>
<body>
{{-- Content --}}
<div class="lg:flex lg:flex-col lg:items-center">
    <div class="p-4 w-full max-w-5xl" id="content">
        {{-- Navbar --}}
        <div class="navbar bg-accent sticky top-3 rounded-md mb-4 px-4 z-40 justify-between">
            {{-- Page --}}
            <div class="flex justify-center items-center gap-2">
                <div class="flex-1 text-2xl text-primary-content">
                    {{ $pageTitle ?? "Dashboard" }}
                </div>
            </div>

            {{-- Profile --}}
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component" src="{{ asset('asset2024') }}/maniac13-pp.png" />
                        </div>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Yield Content Here --}}
        <div class="p-4 rounded-lg">
            @yield('content')
        </div>

        {{--  Footer  --}}
        <div class="w-full pt-12">
            <p class="text-gray-500 text-md">COPYRIGHT &copy; MANIAC XIII, All Rights Reserved</p>
        </div>
    </div>
</div>

@yield('scripts')
<script>
</script>
</body>
</html>
