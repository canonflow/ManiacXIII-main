@extends('admin.layout.index', ['pageActive' => 'admin.dashboard', 'pageTitle' => 'Dashboard'])

@section('styles')
    <style>
        .air-datepicker-cell.-selected- {
            background-color:  oklch(var(--p)) !important;
        }

        .air-datepicker-cell.-current- {
            font-weight: bold;
        }
    </style>
@endsection

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

@section('scripts')

@endsection
