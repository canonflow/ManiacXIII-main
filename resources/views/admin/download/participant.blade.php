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
                <th valign="center" align="center"><strong>No</strong></th>
                <th valign="center" align="center"><strong>School Name</strong></th>
                <th valign="center" align="center"><strong>Header</strong></th>
                <th valign="center" align="center"><strong>Ketua Tim</strong></th>
                <th valign="center" align="center"><strong>Anggota 1</strong></th>
                <th valign="center" align="center"><strong>Anggota 2</strong></th>
            </tr>
        </thead>
        <tbody>
        @php($no = 1)
        @foreach($payloads as $school => $payload)
            @php($isFirst = true)
            @foreach($payload as $header => $items)
                <tr>
                    @if($isFirst)
                        <td rowspan="5" valign="center" align="center">{{ $no }}</td>
                        <td rowspan="5" valign="center" align="center">{{ $school }}</td>
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
