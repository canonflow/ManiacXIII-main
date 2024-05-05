@extends('visitor.welcome')

@section('styles')
    <style>
        /* Variabel */
        @media (max-width: 575px) {
            :root {
                /* Ambil width : 420 */
                --logo-maniac: 75%;
                --fs-1: 0.87rem;
                --fs-timeline: 9.5px;
                --fs-prizes: 10.4px;
                --fs-join-now: 10.3px;
                --fs-ket-prizes-1: 9px;
                --fs-ket-prizes-2: 7px;
                --button: 9px;
                --button-radius: 8px;
                --button-weight: 650;
                --video-container-br: 11px;
                --video-br: 10px;
                --video-height: 130px;
            }
        }

        @media (min-width: 576px) and (max-width: 768px) {
            :root {
                /* Titik tengah : 672 */
                --logo-maniac: 75%;
                --fs-1: 1.7rem;
                --fs-timeline: 22px;
                --fs-prizes: 24px;
                --fs-join-now: 24px;
                --fs-ket-prizes-1: 14px;
                --fs-ket-prizes-2: 11px;
                --button: 17px;
                --button-radius: 12px;
                --button-weight: 650;
                --video-container-br: 22px;
                --video-br: 17px;
                --video-height: 190px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            :root {
                /* Titik Tengah : 880.5 */
                --logo-maniac: 65%;
                --fs-1: 2.3rem;
                --fs-timeline: 29px;
                --fs-prizes: 33px;
                --fs-join-now: 32px;
                --fs-ket-prizes-1: 17px;
                --fs-ket-prizes-2: 14x;
                --button: 23.5px;
                --button-radius: 16px;
                --button-weight: 600;
                --video-container-br: 26px;
                --video-br: 21px;
                --video-height: 250px;
            }
        }

        @media (min-width: 993px) and (max-width: 1200px) {
            :root {
                /* Titik Tengah: 1096.5 */
                --logo-maniac: 65%;
                --fs-1: 3rem;
                --fs-timeline: 37px;
                --fs-prizes: 41px;
                --fs-join-now: 40px;
                --fs-ket-prizes-1: 20px;
                --fs-ket-prizes-2: 17px;
                --button: 29px;
                --button-radius: 26.5px;
                --button-weight: 600;
                --video-container-br: 30px;
                --video-br: 25px;
                --video-height: 300px;
            }
        }

        @media (min-width: 1201px) {
            :root {
                /* Ambil width 1350 */
                --logo-maniac: 65%;
                --fs-1: 3rem;
                --fs-timeline: 44px;
                --fs-prizes: 48px;
                --fs-join-now: 47px;
                --fs-ket-prizes-1: 23px;
                --fs-ket-prizes-2: 20px;
                --button: 35px;
                --button-radius: 31.5px;
                --button-weight: 600;
                --video-container-br: 34px;
                --video-br: 29px;
                --video-height: 400px;
            }
        }

        /* Variabel */

        p {
            margin: 0;
            padding: 0;
        }

        .logo-maniac {
            width: var(--logo-maniac);
        }

        .container-page-1 {
            padding-top: 5%;
        }

        .container-page-4 {
            margin-top: 6%;
            margin-bottom: 17%;
        }

        .container-page-5 {
            margin-top: 5.5%;
        }

        .container-juara {
            top: 28%;
        }

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

        .text-timeline,
        .text-join-now,
        .text-prizes {
            margin: 1.5% 0 1% 0;
            font-family: "cinzel";
            font-weight: 900;
            text-shadow: 0.5px 0.5px red;
        }

        .text-timeline {
            font-size: var(--fs-timeline);
        }

        .text-prizes {
            font-size: var(--fs-prizes);
        }

        .text-join-now {
            font-size: var(--fs-join-now);
        }

        .container-text-3 {
            font-family: "Montserrat";
            font-weight: 600;
            text-align: center;
            font-style: italic;
            color: #5C0616;
        }

        .container-text-3 p:nth-child(1) {
            font-size: var(--fs-ket-prizes-1);
        }

        .container-text-3 p:nth-child(2) {
            font-size: var(--fs-ket-prizes-2);
        }


        /* Text */

        /* Decoration */
        .dec-1 {
            margin: 1.7% 0 3% 0;
            width: 2.3%;
            height: 100%;
        }

        .dec-2 {
            z-index: 1;
            width: 2.3%;
            height: 100%;
        }

        .dec-2-2 {
            height: auto;
            bottom: 0;
        }

        .dec-3 {
            width: 22%;
        }

        .dec-3-2 {
            margin-bottom: 5%;
            transform: rotate(3.14159rad);
        }

        .dec-3-4 {
            transform: rotate(3.14159rad);
            margin-bottom: 37%;
        }

        .dec-3-5 {
            margin-bottom: 3%;
            transform: rotate(3.14159rad);
        }

        /* Decoration */

        /* Button */
        .register-now {
            margin-bottom: calc(0.063rem + 4.25%);
            padding: calc(0.063rem + 1.025%) calc(1px + 4%);
            background-color: #620706;
            border-radius: var(--button-radius);
            border: none;
            font-family: "Montserrat";
            font-size: var(--button);
            font-weight: var(--button-weight);
            letter-spacing: 1.5px;
            color: white;
            cursor: default;
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
            box-shadow: 0 3px 5px -2px gray;
        }

        .poster {
            z-index: 4;
        }

        /* Poster */

        /* Timeline */
        .timeline {
            width: 90%;
        }

        /* Timeline */

        /* Juara */
        .juara {
            width: 33%;
        }

        .juara-2 {
            width: 25%;
        }

        .juara-2-1 {
            margin-right: 5%;
        }

        /* Juara */

        /* video */
        .container-video {
            width: 50%;
            height: 100%;
            padding: 2% 3.5%;
            margin-bottom: 37%;
            border-bottom: 1px solid #D9D9D9;
            border-radius: var(--video-container-br);
            background-color: #A67563;
            box-shadow: 0 4px 6px -2px gray;
        }

        .iframe {
            width: 100%;
            height: var(--video-height);
            border-radius: var(--video-br);
        }

        /* video */
    </style>
@endsection

@section('content')
    <div class="container-xxl">
        <div class="container-page-1 position-relative">
            <div class="d-flex align-items-center flex-column" data-aos="fade-up">
                <img src="{{ asset('asset2024/main/maniac.png') }}" alt="Logo Maniac" class="logo-maniac mb-3 z-1">
            </div>
        </div>
        <div class="container-page-2 position-relative">
            <div class="d-flex align-items-center flex-column">
                <h1 class="text-maniac text-red">WIN UP IDR</h1>
                <h1 class="text-maniac text-red">100 ++ MILLION</h1>
                <img src="{{ asset('asset2024/main/9.png') }}" class="dec-1">
                <div class="register-now">REGISTER NOW</div>
            </div>
        </div>
        <div class="container-page-3 position-relative" data-aos="fade-down" data-aos-delay="50">
            <div class="container-axe d-flex justify-content-center ">
                <img src="{{ asset('asset2024/main/axe.png') }}" class="position-absolute axe axe-1">
                <img src="{{ asset('asset2024/main/axe.png') }}" class="position-absolute axe axe-2">
            </div>
            <div class="wrap-axe-poster">
                <div class="container-axe-poster d-flex justify-content-center">
                    <img src="{{ asset('asset2024/main/8.png') }}" class="dec-2 dec-2-1">
                    <div class="wrap-poster d-flex justify-content-center position-relative">
                        <div class="container-poster d-flex justify-content-center">
                            <img src="{{ asset('asset2024/main/poster.png') }}" alt="Poster Maniac" class="poster w-100">
                        </div>
                    </div>
                    <div class="wrap-dec-2">
                        <img src="{{ asset('asset2024/main/8.png') }}" class="dec-2 dec-2-2 position-absolute">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-page-4 position-relative" data-aos="fade-right" data-aos-delay="100">
            <div class="d-flex justify-content-center flex-column align-items-center">
                <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-1">
                <h1 class="text-timeline">TIMELINE</h1>
                <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-2">
                <img src="{{ asset('asset2024/main/timeline.png') }}" alt="Timeline Maniac" class="timeline">
            </div>
        </div>
        <div class="container-page-5 position-relative" data-aos="fade-left" data-aos-delay="100">
            <div class="d-flex justify-content-center flex-column align-items-center ">
                <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-1">
                <h1 class="text-prizes">PRIZES</h1>
                <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-4">
                <div class="container-juara position-absolute">
                    <div class="img-juara-1 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('asset2024/main/juara-1.png') }}" alt="Juara I" class="juara">
                        <img src="{{ asset('asset2024/main/juara-2.png') }}" alt="Juara II" class="juara">
                        <img src="{{ asset('asset2024/main/juara-3.png') }}" alt="Juara III" class="juara">
                    </div>
                    <div class="img-juara-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('asset2024/main/harapan-1.png') }}" alt="Harapan I" class="juara-2 juara-2-1">
                        <img src="{{ asset('asset2024/main/harapan-2.png') }}" alt="Harapan II" class="juara-2 juara-2-2">
                    </div>
                </div>
                <div class="container-text-3 d-flex justify-content-center flex-column ">
                    <p>*Terdiri atas 3 orang dari SMA/SMK yang sama</p>
                    <p>*&#41;USP berlaku jika masuk Jurusan Teknik Informatika Program Digital Media Technology</p>
                </div>
            </div>
        </div>
        <div class="container-page-5 position-relative">
            <div class="container-text-iframe d-flex justify-content-center flex-column align-items-center ">
                <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-1">
                <h1 class="text-join-now">JOIN NOW</h1>
                <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-5">
                <div class="container-video d-flex justify-content-center align-items-center z-1" data-aos="zoom-in"
                    data-aos-delay="50">
                    <iframe src="https://www.youtube.com/embed/anuXjaAuX8k?si=qphMwYppClkTZCg4" frameborder="0"
                        class="iframe d-flex align-items-center justify-content-center"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
