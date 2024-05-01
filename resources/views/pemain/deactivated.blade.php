<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peserta | Deactivated Page</title>
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
</head>
<body>
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
<div class="p-10 mt-10 flex flex-col items-center">
    <div class="card rounded-lg shadow-md data max-w-lg">
        <img
            src="{{ asset('asset2024') }}/main/viking-head.png"
            alt=""
            class="absolute w-32 top-[-4.3rem] left-[-4rem] animate-pulse"
            draggable="false"
        >
        <img
            src="{{ asset('asset2024') }}/main/axe.png"
            alt=""
            class="absolute hidden sm:block w-28 sm:w-32 top-[-4.4rem] sm:top-[-4.7rem] sm:left-[37.5%] z-[-1]"
            draggable="false"
        >
        <img
            src="{{ asset('asset2024') }}/main/axe.png"
            alt=""
            class="absolute hidden sm:block w-28 sm:w-32 top-[-4.4rem] sm:top-[-4.7rem] sm:right-[37.5%] z-[-1]"
            style="transform: scaleX(-1)"
            draggable="false"
        >
        <h1 class="text-2xl bg-base-300 p-4 font-black rounded-t-lg text-center text-primary select-none">Account Deactivated!</h1>
        <div class="card-body bg-base-200 rounded-b-lg">
            <div class="flex justify-center items-center">
                <img
                    src="{{ asset('asset2024') }}/main/maniac.png"
                    alt=""
                    class="w-80 rounded"
                >
            </div>
            <p>Beberapa alasan yang membuat suatu akun dinonaktifkan:</p>
            <ul class="list-disc ml-8">
                <li>Akun anda teranggap akun spam.</li>
                <li>Akun anda melanggar ketentuan yang berlaku.</li>
            </ul>
            <p>Apabila terjadi kesalahan dalam penonaktifan akun anda, harap hubungi <a target="_blank" href="https://wa.me/6285104914848" style="cursor: pointer !important;" class="font-bold text-primary">Fiorello Austin Ardianto (085104914848)</a></p>
            <p class="mt-3">Thanks,<br />Information System Maniac XIII</p>
            <a href="{{ route('index') }}" class="btn btn-primary mt-5">Back to Home</a>
        </div>
    </div>
    <div class="w-full pt-12 px-2">
        <p class="text-white text-md" id="footer">COPYRIGHT &copy; MANIAC XIII Information System, All rights Reserved</p>
    </div>
</div>
</body>
</html>
