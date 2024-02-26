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
    <table class="" border="10" style="border: 1px solid black;">
        <thead>
            <tr>
                <th valign="center" align="center" style="background-color: #FEECE2; border: 1px solid black;"><strong>No</strong></th>
                <th valign="center" align="center" style="background-color: #FEECE2; border: 1px solid black;"><strong>School Name</strong></th>
                <th valign="center" align="center" style="background-color: #FEECE2; border: 1px solid black;"><strong>Header</strong></th>
                <th valign="center" align="center" style="background-color: #FEECE2; border: 1px solid black;"><strong>Ketua Tim</strong></th>
                <th valign="center" align="center" style="background-color: #FEECE2; border: 1px solid black;"><strong>Anggota 1</strong></th>
                <th valign="center" align="center" style="background-color: #FEECE2; border: 1px solid black;"><strong>Anggota 2</strong></th>
            </tr>
        </thead>
        <tbody>
        @php($no = 1)
        @foreach($payloads as $school => $payload)
            @php($isFirst = true)
            @php($headPos = 0)
            @foreach($payload as $header => $items)
                <tr>
                    @if($isFirst)
                        <td rowspan="5" valign="center" align="center" class="item" style="background-color: #C5EBAA; border: 1px solid black;"><strong>{{ $no }}</strong></td>
                        <td rowspan="5" valign="center" align="center" class="item" style="background-color: #C5EBAA; border: 1px solid black;"><strong>{{ $school }}</strong></td>
                        @php($isFirst = false)
                    @endif
                    @if($headPos == 0)
                        <td valign="center" align="center" style="background-color: #C5EBAA; border: 1px solid black;">{{ $header }}</td>
                        @foreach($items as $item)
                        <td valign="center" align="center" style="background-color: #C5EBAA; border: 1px solid black;">{{ $item }}</td>
                        @endforeach
                    @else
                        <td valign="center" align="center" style="border: 1px solid black;">{{ $header }}</td>
                        @foreach($items as $item)
                            <td valign="center" align="center" style="border: 1px solid black;">{{ $item }}</td>
                        @endforeach
                    @endif
                </tr>
                @php($headPos++)
            @endforeach
            @php($no++)
        @endforeach
        </tbody>
    </table>
</body>
</html>
