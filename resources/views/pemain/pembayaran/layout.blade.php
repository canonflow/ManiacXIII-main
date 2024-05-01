<!doctype html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peserta | {{ $title ?? 'Pembayaran' }}</title>
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.png" type="image/png">
    @vite('resources/css/app.css')
    <style>
        * {
            scroll-behavior: smooth;
        }

        body {
            cursor: url("{{ asset('asset2024') }}/cursor/CURSOR.cur"),
            url("{{ asset('asset2024') }}/cursor/CURSOR.svg"),
            url("{{ asset('asset2024') }}/cursor/CURSOR.png"), auto;
            background: url("{{ asset('asset2024') }}/main/peserta-pembayaran.png") no-repeat center;
            background-size: cover;
        }

        button:hover, a:hover, li:hover {
            cursor: url("{{ asset('asset2024') }}/cursor/shield.svg"),
            url("{{ asset('asset2024') }}/cursor/shield.png"), pointer !important;
        }

        input:hover {
            cursor: url("{{ asset('asset2024') }}/cursor/sword.svg"),
            url("{{ asset('asset2024') }}/cursor/sword.png"), text !important;
        }

        body::-webkit-scrollbar {
            width: 0.5em;
        }

        body::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: oklch(var(--b3));
            width: 1px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: oklch(var(--s));
            outline: 1px solid slategrey;
            border-radius: 0.8rem;
        }
    </style>
    @yield('cdn')
    @yield('styles')
</head>
<body class="bg-base-100 min-h-screen">
{{--  Navigation Bar  --}}
<div class="navbar bg-base-200 px-4 mb-2 z-50 rounded-br-xl rounded-bl-xl">
    <div class="flex-1">
        <a class="btn btn-ghost text-2xl">
{{--            <img src="{{ asset('asset2024') }}/maniac13-pp.png" alt="" class="w-8 rounded">--}}
            <img src="{{ asset('asset2024') }}/logo-maniac.jpg" alt="" class="w-8 rounded">
            Maniac XIII
        </a>
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

{{--  Content  --}}
<div class="p-10 mt-7 flex flex-col items-center">
    <div class="card rounded-lg shadow-md data">
        <img
            src="{{ asset('asset2024') }}/main/viking-head.png"
            alt=""
            class="absolute w-32 top-[-4.3rem] left-[-4rem] animate-pulse"
            draggable="false"
        >
        <h1 class="text-2xl bg-base-300 p-5 font-black rounded-t-lg text-center">{{ $heading ?? "Verifikasi Bukti Pembayaran" }}</h1>
        <div class="card-body bg-base-200 rounded-b-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 place-content-center gap-7 md:gap-12">
                <div class="flex gap-3 items-center">
                    <div
                        class="text-lg flex justify-content-center items-center py-2 px-5 rounded bg-primary text-primary-content">
                        1
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold">Upload</p>
                        <p class="text-info-content font-medium text-sm">Upload Bukti Pembayaran</p>
                    </div>
                </div>
                <div class="flex gap-3 items-center">
                    <div
                        class="text-lg flex justify-content-center items-center py-2 px-5 rounded {{ isset($step2) ? "bg-primary" : "bg-base-300" }} text-primary-content"
                    >
                        2
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold">Proses Verifikasi</p>
                        <p class="text-info-content font-medium text-sm">Bukti Pembayaran Sedang Diverifikasi</p>
                    </div>
                </div>
                <div class="flex gap-3 items-center">
                    <div
                        class="text-lg flex justify-content-center items-center py-2 px-5 rounded bg-base-300 text-primary-content"
                    >
                        3
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold">Selesai</p>
                        <p class="text-info-content font-medium text-sm">Tim Resmi Terdaftar</p>
                    </div>
                </div>
            </div>
{{--            <p class="pb-3 sm:pb-0 break-words">--}}
{{--                Anda dapat melihat <strong>Available Contest</strong>, <strong>Upcoming Contest</strong>, and <strong>Finished Contest</strong> di sini.--}}
{{--            </p>--}}
{{--            <div role="alert" class="alert alert-success rounded-md py-2">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
{{--                <span>Mohon lakukan refresh page untuk update data contest.</span>--}}
{{--            </div>--}}
            @yield('content')
        </div>
    </div>
    <div class="w-full pt-12 px-2">
        <p class="text-white text-md" id="footer">COPYRIGHT &copy; MANIAC XIII Information System, All rights Reserved</p>
    </div>
</div>

@yield('scripts')
</body>
</html>
