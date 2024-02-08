@extends('admin.layout.index', ['pageActive' => 'admin.dashboard', 'pageTitle' => 'Dashboard'])

@section('content')
    <div class="bg-red p-0">
        @if(isset($payload))
            @foreach ($payload as $name => $py)
                <p>{{ $name }}</p>
                <p>{{ $py['chat'] }}</p>
                <p>{{ $py['status'] }}</p>
                <br /> <br />
            @endforeach
        @endif
    </div>
@endsection
