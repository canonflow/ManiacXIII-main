@extends('visitor.welcome')

@section('styles')
    <style>
         /* Variabel */
         @media (max-width: 575px) {
            :root{
                --fs-1: 0.87rem;
                --button: 7px;
                --button-radius: 8px;
                --button-weight: 550;
            }
        }
        
        @media (min-width: 576px) and (max-width: 768px){
            :root{
                --fs-1: 1.7rem;
                --button: 17px;
                --button-radius: 12px;
                --button-weight: 550;
            }
        } 
        
        @media (min-width: 769px) and (max-width: 992px){
            :root{
                --fs-1: 2.3rem;
                --button: 23.5px;
                --button-radius: 16px;
                --button-weight: 600;
            }
        } 

        @media (min-width: 993px) and (max-width: 1200px){
            :root{
                --fs-1: 3rem;
                --button: 29px;
                --button-radius: 24.5px;
                --button-weight: 600;
            }
        } 
        
        @media (min-width: 1201px) {
            :root{
                --fs-1: 3.6rem;
                --button: 39px;
                --button-radius: 31.5px;
                --button-weight: 600;
            }
        }
        /* Variabel */
        .container-bg{
            background-image: url("{{ asset('asset2024/main/bg-transparent.png') }}");
            background-repeat: repeat-y;
            background-size: cover;
        }

        .container-page-1 {
            padding-top: 5%;
        }

        /* Cloud */
        .cloud {
            width: 59%;
            object-fit: cover;
            position:absolute;
        }
        
        .cloud-1{
            top: 9%;
            left: -23%;
        }

        .cloud-2{
            top: 56%;
            right:-31%
        }

        .cloud-3{
            top: 15%;
            right: -23%;
        }

        .cloud-4 {
            top: 29%;
            left: -26%;
        }

        .cloud-5 {
            top: 19%;
            left: -2.7%;
        }
        
        .cloud-6 {
            top: 50%;
            right: -13%;
        }
        /* Cloud */

        /* Text */
        .text-maniac {
            margin: 0;
            padding: 0;
            z-index: 1;
            font-family: 'Montserrat';
            font-size: var(--fs-1);
            font-weight: 600;
            color: #620706;
        }
        /* Text */

        /* Decoration */
        .dec-1{
            margin: 1.7% 0 3% 0;
            width: 2.3%;
            height: 100%;
        }

        .dec-2{
            z-index: 1;
            width: 2.3%;
            height: 100%;
        }
        
        .dec-1-2 {
            height: auto;
            bottom: 0;
        }
        /* Decoration */

        /* Button */
        button {
            margin-bottom: calc(0.063rem + 4.25%); 
            padding: calc(0.063rem + 1.025%) calc(1px + 4%);
            background-color: #620706;
            border-radius: var(--button-radius);
            border: none;
            font-family: "Montserrat";
            font-size: var(--button);
            font-weight: var(--button-weight);
            letter-spacing: 2px;
            color: white;
        }
        /* Button */

        .container-axe-poster {
            padding-top: 4%;
        }

        /* Axe */
        .axe {
            z-index: 3;
            top: 0;
            width: 16%;
        }

        .axe-2 {
            transform: rotateY(3.142rad);
        }
        /* Axe */

        /* Poster */
        .wrap-poster {
            width: 60%;
            margin: 2%;
            padding: 2.8%;
            background-color: #A67563;
        }

        .poster{
            z-index: 4;
        }
        /* Poster */
    </style>
@endsection

@section('content')
<div class="container-bg container-fluid">
    <div class="container-page-1 position-relative">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-1 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-2 z-0">
        <div class="d-flex align-items-center flex-column">
            <img src="{{ asset('asset2024/main/maniac.png') }}" alt="Logo Maniac" class="w-75 mb-3 z-1">
        </div>
    </div>
    <div class="container-page-2 position-relative">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-3 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-4 z-0">
        <div class="d-flex align-items-center flex-column">
            <h1 class="text-maniac text-red">WIN UP IDR</h1>
            <h1 class="text-maniac text-red">100 ++ MILLION</h1>
            <img src="{{ asset('asset2024/main/9.png') }}" class="dec-1">
            <button>REGISTER NOW</button>
        </div>
    </div>
    <div class="container-page-3 position-relative">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-5 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-6 z-0">
        <div class="container-axe d-flex justify-content-center ">
            <img src="{{ asset('asset2024/main/axe.png') }}" class="position-absolute axe axe-1">
            <img src="{{ asset('asset2024/main/axe.png') }}" class="position-absolute axe axe-2">
        </div>
        <div class="wrap-axe-poster">
            <div class="container-axe-poster d-flex justify-content-center ">
                <img src="{{ asset('asset2024/main/8.png') }}" class="dec-2 dec-1-1">
                <div class="wrap-poster d-flex justify-content-center position-relative">
                    <div class="container-poster d-flex justify-content-center ">
                        <img src="{{ asset('asset2024/main/peserta-contest.png') }}" alt="Poster Maniac" class="poster w-100">
                    </div>
                </div>
                <div class="wrap-dec-2">
                    <img src="{{ asset('asset2024/main/8.png') }}" class="dec-2 dec-1-2 position-absolute">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection