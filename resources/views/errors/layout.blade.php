<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.png" type="image/png">
    @vite(['resources/css/app.css'])
    <style>
        body {
            cursor: url("{{ asset('asset2024') }}/cursor/CURSOR.cur"),
            url("{{ asset('asset2024') }}/cursor/CURSOR.svg"),
            url("{{ asset('asset2024') }}/cursor/CURSOR.png"), auto;
        }

        button:hover, a:hover, li:hover {
            cursor: url("{{ asset('asset2024') }}/cursor/shield.svg"),
            url("{{ asset('asset2024') }}/cursor/shield.png"), pointer !important;
        }
    </style>
</head>
<body>
    <div class="p-10 min-h-screen flex flex-col items-center justify-center border border-black gap-y-3 lg:gap-y-1">
        <img src="{{ asset('asset2024') }}/main/maniac.png" alt="" class="sm:w-2/3 md:w-1/2 xl:w-1/3">
        <div class="flex gap-x-2 lg:gap-x-3 text-xl md:text-2xl font-black text-primary">
            <p>{{ $code }}</p>
            <p>{{ $title }}</p>
        </div>
        <a href="{{ route('index') }}" class="btn btn-secondary px-5 lg:px-6 rounded mt-1 lg:mt-3">Back to Home</a>
    </div>
</body>
</html>
