@extends('admin.layout.index', ['pageActive' => 'admin.dashboard', 'pageTitle' => 'Dashboard'])

@section('styles')
    <style>
        .air-datepicker-cell.-selected- {
            background-color: oklch(var(--p)) !important;
        }

        .air-datepicker-cell.-current- {
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <a class="btn btn-outline btn-primary" href="{{ route('admin.download.participants') }}">Download</a>
@endsection

@section('scripts')

@endsection
