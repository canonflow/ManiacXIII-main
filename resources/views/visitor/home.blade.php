@extends('visitor.welcome')

@section('styles')
    <style>
        /* Responsive teks */
        @media (max-width: 575px) {
            :root{
            --fs-1: 0.87rem;
            --fs-2: 0.75rem;
            --fs-3: 0.5rem;
            --fs-4: 0.25rem;
            --fs-5: 0.10rem;
            --button: 7px;
            }
        }
        
        @media (min-width: 576px) and (max-width: 768px){
            :root{
                --fs-1: 1.7rem;
                --fs-2: 1.45rem;
                --fs-3: 1.20rem;
                --fs-4: 0.95rem;
                --fs-5: 0.70rem;
                --button: 13px;
            }
        } 
        
        @media (min-width: 769px) and (max-width: 992px){
            :root{
                --fs-1: 2.3rem;
                --fs-2: 2.15rem;
                --fs-3: 1.8rem;
                --fs-4: 1.65rem;
                --fs-5: 1.4rem;
                --button: 23px;
            }
        } 

        @media (min-width: 993px) and (max-width: 1200px){
            :root{
                --fs-1: 3rem;
                --fs-2: 2.75rem;
                --fs-3: 2.5rem;
                --fs-4: 2.25rem;
                --fs-5: 2rem;
                --button: 32px;
            }
        } 
        
        @media (min-width: 1201px) {
            :root{
                --fs-1: 3.6rem;
                --fs-2: 3.35rem;
                --fs-3: 3.1rem;
                --fs-4: 2.85rem;
                --fs-5: 2.6rem;
                --button: 42px;
            }
        }
        /* Responsive teks */
        
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
            font-size: var(--fs-1);
            font-weight: 600;
            color: #620706;
        }
        
        .decoration{
            margin-top: 2%;
            margin-bottom: 2.625rem;
            width: 2.3%;
        }

        button {
            /* padding: 20px 50px; */
            padding: calc(0.063rem + 1.025%) calc(1px + 4%);
            /* margin-bottom: 20px;  */
            margin-bottom: calc(0.063rem + 1.025%); 
            background-color: #620706;
            border: none;
            /* border-radius: 31px; */
            border-radius: 29px;
            font-family: 'Montserrat';
            font-size: var(--button);
            font-weight: 550;
            letter-spacing: 2px;
            color: white;
            cursor: context-menu;
        }
       
    </style>
@endsection

@section('content')
    <div class="container-bg container-fluid">
        <div class="container-page">
            <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-1">
            <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-2">
            <div class="title d-flex justify-content-center flex-column">
                <img class="logo-maniac img-fluid" src="{{ asset('asset2024/main/maniac.png') }}" alt="logo-maniac">
                <h1 class="text-maniac text-red">WIN UP IDR</h1>
                <h1 class="text-maniac text-red">100 ++ MILLION</h1>
                <img src="{{ asset('asset2024/main/9.png') }}" class="decoration">
                <button>REGISTER NOW</button>
                <!-- <div class="d-flex ">
                    <img src="{{ asset('asset2024/main/8.png') }}" >
                    <div>
                        <img src="{{ asset('asset2024/main/axe.png') }}" class="axe">
                        <img src="{{ asset('asset2024/main/axe.png') }}" class="axe axe-invers">
                        <div class="container-poster d-flex justify-content-center align-items-center">
                            <div class="poster"></div>
                        </div>
                    </div>
                    <img src="{{ asset('asset2024/main/8.png') }}" >
                </div> -->
            </div>
        </div>
    </div>
@endsection
