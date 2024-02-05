<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Aja</title>
    @vite(['resources/css/app.css'])
</head>
<body class="" data-theme="dark">
    <h1 class="underline text-5xl">Test</h1>
    <button class="border border-black px-4 py-1 rounded bg-red-400 hover:bg-red-300 active:bg-red-500 mt-5">Submit</button>
    {{-- Daisy UI --}}
    <button class="btn btn-primary">Daisy Primary</button>
    <button class="btn btn-secondary">Daisy Secondary</button>
    <div data-theme="light" class="mt-5 p-2">
        LIGHT THEME
        <button class="btn btn-primary">Daisy Primary in Light Theme</button>
    </div>
</body>
</html>