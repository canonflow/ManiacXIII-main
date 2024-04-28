@extends('visitor.welcome')

@section('styles')
    <style>
        .container-bg {
            background-image: url("{{ asset('asset2024/main/bg-transparent.png') }}");
            background-repeat: repeat-y;
            background-size: cover;
        }

        .container-page{
            padding-top: 5%;
            position: relative;
        }
        
        .cloud {
            width: 59%;
            object-fit: cover;
            position:absolute;
            z-index: 0;
        }
        
        .cloud-1{
            top: 9%;
            left: -23%;
        }

        .cloud-2{
            top: 33%;
            right:-31%
        }
        .logo-maniac{
            width: 76%;
            z-index: 1;
        }

        .text-maniac {
            margin: 0;
            padding: 0;
            z-index: 1;
            font-family: 'Montserrat';
            font-size: calc(1rem + 280%);
            font-weight: 600;
        }
        
        .decoration{
            margin-top: 2%;
            margin-bottom: 2.625rem;
            width: 2.3%;
        }

    </style>
@endsection

@section('content')
    <div class="container-bg container-fluid">
        <div class="container-page">
            <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-1">
            <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-2">
            <div class="title d-flex justify-content-center align-items-center flex-column">
                <img class="logo-maniac img-fluid" src="{{ asset('asset2024/main/maniac.png') }}" alt="logo-maniac">
                <h1 class="text-maniac text-red">WIN UP IDR</h1>
                <h1 class="text-maniac text-red">100 ++ MILLION</h1>
                <img src="{{ asset('asset2024/main/9.png') }}" class="decoration">
            </div>
        </div>
    </div>
@endsection
