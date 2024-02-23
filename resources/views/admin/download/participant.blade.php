<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <table class="">
        <thead>
            <tr>
                <th>No</th>
                <th>School Name</th>
                <th>Header</th>
                <th>Ketua Tim</th>
                <th>Anggota 1</th>
                <th>Anggota 2</th>
            </tr>
        </thead>
        <tbody>
        @php($no = 1)
        @foreach($payloads as $school => $payload)
            @php($isFirst = true)
            @foreach($payload as $header => $items)
                <tr>
                    @if($isFirst)
                        <td rowspan="4">{{ $no }}</td>
                        <td rowspan="4">{{ $school }}</td>
                        @php($isFirst = false)
                    @endif
                    <td>{{ $header }}</td>
                    @foreach($items as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            @endforeach
            @php($no++)
        @endforeach
        </tbody>
    </table>
</body>
</html>
