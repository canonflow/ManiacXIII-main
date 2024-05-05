@extends('visitor.welcome')

@section('styles')
    <style>
        :root {
            --video-h: 165px;
            --video-w: 200%;
        }

        {{-- .container-bg { --}} {{--    background-image: url("{{ asset('asset2024/main/bg-transparent.png') }}"); --}} {{--    background-repeat: repeat-y; --}} {{--    background-size: cover; --}} {{-- } --}} .box {
            background-color: #a67563;
            border-radius: 20px 20px 0 0;
        }

        .carousel-image-wrapper {
            max-width: 60%;
            margin: 0 auto;
            border-radius: 20px;
        }

        .image-box {
            width: auto;
            height: auto;
        }

        h1 {
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
                font-size: 1.5vw !important;
            }
        }

        .video-container {
            width: 100%;
            height: 10%;
            padding: 1.25rem 2rem;
            border-radius: 30px;
            background-color: #A67563;
        }

        /*.video-container video {*/
        /*    max-width: 100%; !* Agar video tidak melewati lebar container *!*/
        /*    height: auto; !* Mempertahankan rasio aspek *!*/
        /*    border-radius: 20px; !* Menjaga sudut melengkung *!*/
        /*}*/

        #video {
            height: var(--video-h);
            width: var(--video-w);
        }

        iframe {
            border-radius: 1rem;
        }

        @media (max-width: 486px) {
            :root {
                --video-w: 100%;
            }
        }

        @media (min-width: 486px) {
            :root {
                --video-h: 240px;
            }
        }

        @media (min-width: 772px) {
            :root {
                --video-h: 225px;
                --video-w: 100%;
            }

            .video-container {
                width: 70%;
            }
        }

        @media (min-width: 992px) {
            :root {
                --video-h: 314px;
            }
        }

        @media (min-width: 1200px) {
            :root {
                --video-h: 440px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <h1 data-aos="zoom-in" class="text-center text-bold py-2">WHAT IS MANIAC</h1>
        <br>
        <div>
            <div class="box py-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-image-wrapper d-flex justify-content-center">
                                <img src="{{ asset('asset2024/main/foto-peserta-1.jpg') }}" class="rounded img-fluid"
                                    alt="foto1">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image-wrapper d-flex justify-content-center">
                                <img src="{{ asset('asset2024/main/foto-peserta-2.jpg') }}" class="rounded img-fluid"
                                    alt="foto2">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image-wrapper d-flex justify-content-center">
                                <img src="{{ asset('asset2024/main/foto-peserta-3.jpg') }}" class="rounded img-fluid"
                                    alt="foto3">
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <img src="{{ asset('asset2024/main/arrow-top.png') }}" style="transform: rotate(-90deg)"
                        class="carousel-arrow prev-arrow" alt="Previous">
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <img src="{{ asset('asset2024/main/arrow-top.png') }}" style="transform: rotate(90deg)"
                        class="carousel-arrow prev-arrow" alt="Next">
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="body">
                <p class="fs-5 font-normal">
                    MANIAC adalah acara lomba untuk anak SMA/K sederajat yang mencakup
                    workshop, rally games, dan final. Materi yang dilombakan mengenai Game
                    Concept Design dan Game Asset Design. MANIAC diselenggarakan oleh jurusan
                    Teknik Informatika program Digital Media Technology Universitas Surabaya.
                </p>
            </div>
        </div>

        <br>
        <h1 class="text-center text-bold py-2 mt-5">JOIN NOW</h1>
        <div class="container py-2 d-flex justify-content-center">
            <div class="video-container" data-aos="fade-up">
                <div class="d-flex justify-content-center align-items-center z-1">
                    <iframe id="video" src="https://www.youtube.com/embed/anuXjaAuX8k?si=OfKhz67COFjPfS8d"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
