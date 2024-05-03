@extends('visitor.welcome')

@section('styles')
    <style>
        .container-bg {
            background-image: url("{{ asset('asset2024/main/bg-transparent.png') }}");
            background-repeat: repeat-y;
            background-size: cover;
        }

        .box {
            background-color: #a67563;
            border-radius: 20px 20px 0 0;
        }

        .carousel-image-wrapper {
            padding: 40px;
            background-color: black;
            max-width: 60%;
            margin: 0 auto;
            border-radius: 20px;
        }

        .image-box {
            width: auto;
            height: auto;
        }

        h1{
            font-family: Cinzel;
            text-shadow: 1px 1px 1px #620706;
        }

        .body {
            background-color: #7f4c42;
            color: white;
            border-radius: 0 0 20px 20px;
            padding: 30px;
            font-weight: 550;
            text-align: center;
            font-family: Montserrat;
        }
        /* Ukuran teks untuk layar kecil */
        @media (max-width: 576px) {
            .body {
                font-size: 4vw !important;
            }
        }

        /* Ukuran teks untuk layar sedang */
        @media (min-width: 577px) and (max-width: 768px) {
            .body {
                font-size: 2.5vw !important;
            }
        }

        /* Ukuran teks untuk layar besar */
        @media (min-width: 769px) {
            .body {
                font-size: 1.5vw !important ;
            }
        }

        .video-container {
            background-color: #a67563;
            padding: 20px;
            border-radius: 20px;
            max-width: 400px; /* Lebar maksimal untuk container video */
            width: 100%; /* Agar responsif terhadap container induk */
            display: flex;
            justify-content: center; /* Untuk menjaga video tetap terpusat */
        }

        .video-container video {
            max-width: 100%; /* Agar video tidak melewati lebar container */
            height: auto; /* Mempertahankan rasio aspek */
            border-radius: 20px; /* Menjaga sudut melengkung */
        }
    </style>
@endsection

@section('content')
<div class="container-bg container-xxl">
    <div class="container py-5">
        <h1 class="text-center text-bold py-2">WHAT IS MANIAC</h1>
        <br>
        <div class="box py-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-image-wrapper d-flex justify-content-center">
                                <img src="{{ asset('asset2024/main/shield.png') }}" class="rounded img-fluid" alt="Shield">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image-wrapper d-flex justify-content-center">
                                <img src="{{ asset('asset2024/main/Shield.png') }}" class="rounded img-fluid" alt="Axe">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image-wrapper d-flex justify-content-center">
                                <img src="{{ asset('asset2024/main/shield.png') }}" class="rounded img-fluid" alt="Sword">
                            </div>
                        </div>
                    </div>
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        </div>
        <div class="body">
            <p class="fs-5 font-normal">
                MANIAC adalah acara lomba untuk anak SMA/K sederajat yang mencakup
                workshop, rally games, dan final. Materi yang dilombakan mengenai Game
                Concept Design dan Game Asset Design. MANIAC diselenggarakan oleh jurusan
                Teknik Informatika program Digital Media Technology Universitas Surabaya.
            </p>
        </div>
        <br>
        <h1 class="text-center text-bold py-2 mt-5">JOIN NOW</h1>
        <div class="container py-2 d-flex justify-content-center">
            <div class="video-container">
                <video controls>
                    <source src="video-example.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>
@endsection
