<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Super SI | MANIAC XIII</title>
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
            height: 0.5rem;
        }

        *::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            /*background-color: oklch(var(--b3));*/
            background-color: #f8fafc;
            width: 1px;
        }

        *::-webkit-scrollbar-thumb {
            /*background-color: oklch(var(--s));*/
            background-color: #1e293b;
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

        html {
            background-color: #1e293b !important;
        }

        .divider {
            color: #cbd5e1 !important;
        }

        .divider::before, .divider::after {
            background-color: #cbd5e1 !important;
        }
    </style>
    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/datepicker.js', 'resources/js/swiper.js'])

    {{--  CDN  --}}
    @yield('cdn')
    <!-- Custom CSS -->
    @yield('styles')
</head>
<body>


{{-- Side Panel --}}
<aside id="logo-sidebar" class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-slate-700">
        {{-- Logo dan Judul --}}
        <a href="{{ route('super-si.index') }}" class="flex items-center ps-2.5 mb-5">
            <div class="avatar mr-3">
                <div class="w-10 rounded">
                    <img src="{{ asset('asset2024') }}/logo-maniac.jpg" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
                </div>
            </div>
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Maniac XIII</span>
        </a>

        <ul class="space-y-2 font-medium">
            {{-- Dashboard --}}
            <li class="">
                <a href="{{ route('super-si.index') }}" class="flex items-center p-2 rounded-lg {{ $pageActive == "super-si.rally" ? 'bg-slate-300 text-slate-800 ' : 'hover:bg-slate-100 group text-white hover:text-base-content' }} active:scale-95 transition-all">
                    <svg class="w-5 h-5 transition duration-75 group-hover:text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Rally Games</span>
                </a>
            </li>
            <div class="divider text-sm">Game Besar</div>
            <li>
                <a href="{{ route('super-si.gamebesar.index') }}" class="flex items-center p-2 rounded-lg {{ $pageActive == "super-si.gamebesar" ? 'bg-slate-300 text-slate-800 ' : 'hover:bg-slate-100 group text-white hover:text-base-content' }} active:scale-95 transition-all">
                    <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Game Besar</span>
                </a>
            </li>
            <div class="divider text-sm">Player</div>
            <li>
                <a href="{{ route('super-si.player.index') }}" class="flex items-center p-2 rounded-lg {{ $pageActive == "super-si.player" ? 'bg-slate-300 text-slate-800 ' : 'hover:bg-slate-100 group text-white hover:text-base-content' }} active:scale-95 transition-all">
                    <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Player</span>
                </a>
            </li>
            <div class="divider text-sm">Leaderboard</div>
            <li>
                <a href="{{ route('super-si.index') }}" class="flex items-center p-2 rounded-lg {{ $pageActive == "admin.users" ? 'bg-slate-300 text-slate-800 ' : 'hover:bg-slate-100 group text-white hover:text-base-content' }} active:scale-95 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-slate-800">
                        <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                    </svg>
{{--                    <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">--}}
{{--                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>--}}
{{--                    </svg>--}}
                    <span class="flex-1 ms-3 whitespace-nowrap">Leaderboard</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

{{-- Content --}}
<div class="p-4 sm:ml-64">
    {{-- Navbar --}}
    <div class="navbar bg-slate-700 sticky top-3 rounded-md mb-4 px-4 z-40 justify-between">
        {{-- Page --}}
        <div class="flex justify-center items-center gap-2">
            {{-- Button Open Side Panel --}}
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-neutral-content rounded-lg sm:hidden hover:bg-base-100 hover:text-secondary focus:outline-none active:scale-95 transition-all">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <div class="flex-1 text-2xl text-primary-content font-medium">
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
    <div class="p-4 rounded-lg text-slate-50">
        @yield('content')
    </div>

    {{--  Footer  --}}
    <div class="w-full pt-12">
        <p class="text-slate-400 text-md">COPYRIGHT &copy; MANIAC XIII, All Rights Reserved</p>
    </div>
</div>

@yield('scripts')
{{-- PUSHER SETUP --}}
@vite('resources/js/app.js')
<script type="module">
    console.log(window.Echo);
</script>
<script>

</script>
</body>
</html>
