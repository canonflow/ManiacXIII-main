<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')
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
            background-color: oklch(var(--nc));
            outline: 1px solid slategrey;
            border-radius: 0.8rem;
        }
    </style>
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    @yield('cdn')
    @yield('styles')
</head>
<body class="bg-base-100" data-theme="dark">
{{--  Navigation Bar  --}}
<div class="navbar bg-base-100 px-4 mb-2 z-50">
    <div class="flex-1">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a class="{{ (Route::current()->getName() == 'acara.index') ? 'active' : '' }}" href="{{ route('acara.index') }}">Dashboard</a></li>
                <li><a class="{{ (Route::current()->getName() == 'acara.contest') ? 'active' : '' }}" href="{{ route('acara.contest') }}">Contest</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost text-2xl">Maniac XIII</a>
    </div>
    <div class="flex-none z-50">
        <ul class="menu menu-horizontal px-6">
            <li>
                <details>
                    <summary>
                        Menu
                    </summary>
                    <ul class="p-2 bg-base-100 rounded-t-none">
                        <li>
                            <a href="{{ route('index') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>

<div class="flex justify-center hidden lg:flex sticky top-5 z-40">
    <div class="hidden lg:flex lg:justify-center bg-base-300 rounded-lg w-3/4 py-1 max-w-7xl">
        <div class="flex justify-center items-center">
            <ul class="menu menu-horizontal gap-7">
                <li>
                    <a
                        class="{{ (Route::current()->getName() == 'acara.index') ? 'active' : '' }}"
                        href="{{ route('acara.index') }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a
                        class="{{ (Route::current()->getName() == 'acara.contest') ? 'active' : '' }}"
                        href="{{ route('acara.contest') }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                        </svg>
                        Contest
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="p-10 mt-7 flex flex-col items-center">
    @yield('content')
    <div class="w-full pt-12 px-2">
        <p class="text-gray-500 text-md">COPYRIGHT &copy; MANIAC XIII Information System, All rights Reserved</p>
    </div>
</div>
@yield('scripts')
</body>
</html>
