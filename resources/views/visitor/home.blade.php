@extends('visitor.welcome')

@section('styles')
    <style>
         /* Variabel */
         @media (max-width: 575px) {
            :root{ /* Ambil width : 420 */
                --fs-1: 0.87rem;
                --fs-timeline: 9.5px;
                --fs-prizes: 10.4px;
                --fs-join-now: 10.3px;
                --button: 7px;
                --button-radius: 8px;
                --button-weight: 550;
            }
        }

        @media (min-width: 576px) and (max-width: 768px){
            :root{/* Titik tengah : 672 */
                --fs-1: 1.7rem;
                --fs-timeline: 22px;
                --fs-prizes: 24px;
                --fs-join-now: 24px;
                --button: 17px;
                --button-radius: 12px;
                --button-weight: 550;
            }
        }

        @media (min-width: 769px) and (max-width: 992px){
            :root{ /* Titik Tengah : 880.5 */
                --fs-1: 2.3rem;
                --fs-timeline: 29px;
                --fs-prizes: 33px;
                --fs-join-now: 32px;
                --button: 23.5px;
                --button-radius: 16px;
                --button-weight: 600;
            }
        }

        @media (min-width: 993px) and (max-width: 1200px){
            :root{/* Titik Tengah: 1096.5 */
                --fs-1: 3rem;
                --fs-timeline: 37px;
                --fs-prizes: 41px;
                --fs-join-now: 40px;
                --button: 29px;
                --button-radius: 26.5px;
                --button-weight: 600;
            }
        }

        @media (min-width: 1201px) {
            :root{/* Ambil width 1350 */
                --fs-1: 3.6rem;
                --fs-timeline: 44px;
                --fs-prizes: 48px;
                --fs-join-now: 47px;
                --button: 39px;
                --button-radius: 31.5px;
                --button-weight: 600;
            }
        }
        /* Variabel */

        p {
            margin: 0;
            padding: 0;
        }

        .container-bg{
            background-image: url("{{ asset('asset2024/main/bg-transparent.png') }}");
            background-repeat: repeat-y;
            background-size: cover;
        }

        .container-page-1 {
            padding-top: 5%;
        }

        .container-page-4{
            margin-top: 6%;
            margin-bottom: 17%;
        }

        .container-page-5 {
            margin-top: 5.5%;
        }

        .container-juara {
            top: 28%;
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
        .cloud-7 {
            top:-10%;
            left: -23.5%;
        }

        .cloud-8 {
            top: -19%;
            right: -28%;
        }

        .cloud-9 {
            top: -17.5%;
            left: -15.5%;
        }

        .cloud-10 {
            transform: rotateY(3.14159rad);
            top: -3%;
            right: -21.5%;
        }

        .cloud-11{
            top: 65%;
            right: -30%;
        }

        .cloud-12 {
            top: 58%;
            left: -12%;
        }

        .cloud-13{
            top: -12%;
            right: -27%;
        }

        .cloud-14 {
            transform: rotateY(3.14159rad);
            top: -10%;
            left: -24%;
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

        .text-timeline, .text-join-now, .text-prizes{
            margin: 1.5% 0 1% 0;
            font-family: "cinzel";
            text-shadow: 0.5px 0.5px red;
        }

        .text-timeline, .text-prizes, .text-join-now {
            font-weight: 600;
        }
        .text-timeline{
            font-size: var(--fs-timeline);
        }

        .text-prizes{
            font-size: var(--fs-prizes);
        }

        .text-join-now{
            font-size: var(--fs-join-now);
        }

        .timeline-text-1{
            font-family: "viking";
            font-size: 26px;
            white-space: nowrap;
        }

        .timeline-text-2{
            font-family: "cinzel";
            font-size: 15px;
            font-weight: 600;
            white-space: nowrap;
        }

        .container-text-timeline-1-2 {
            top: 43.5%;
            left: 17.5%;
        }

        .container-text-1 {
            margin-right: 20%;
        }

        /* .container-text-1 {
            top: var(--timeline-1-t);
            left: 17.5%;
            width: auto;
        }

        .container-text-1 p {
            font-family: "viking";
            font-size: var(--fs-timeline-1);
            white-space: nowrap;
        }

        .container-text-1 p:nth-child(1){
            margin-right: 20%;
        }

        .container-text-2{
            top: 51%;
            left: var(--timeline-2-l);
        }

        .container-text-2 p{
            font-family: "cinzel";
            font-size: var(--fs-timeline-2);
            white-space: nowrap;
        }
        .container-text-2 p:nth-child(2){
            margin-left: var(--timeline-2-mr);
        } */

        .container-text-3 {
            font-family: "Montserrat";
            font-weight: 600;
            text-align: center;
            font-style: italic;
            color: #5C0616;
        }

        .container-text-3 p:nth-child(1){
            font-size: 20px;
        }

        .container-text-3 p:nth-child(2){
            font-size: 17px;
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
            letter-spacing: 2px;
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
        }

        .poster{
            z-index: 4;
        }
        /* Poster */

        /* Timeline */
        .timeline{
            width: 90%;
        }
        /* Timeline */

        /* Juara */
        .juara {
            width: 33%;
        }

        .juara-2{
            width: 25%;
        }

        .juara-2-1{
            margin-right: 5%;
        }
        /* Juara */

        /* video */
        .container-video{
            width: 50%;
            height: 10%;
            padding: 2.5% 3%;
            border-radius: 30px;
            background-color: #A67563;
        }

        video {
            width: 100%;
            height: 40%;
            border-radius: 25px;
        }
        /* video */

        .container-bottom-home{
            padding-top: 44%; /* Kasih responsive ini berhubungan dengan .buttom-web-home */
            align-items: start;
        }

        .bottom-web-home{
            bottom: 0%;
            width: 102.4%;
            /*height: 42.3%; !* Kasih Responsive*!*/
            /*object-fit: cover;*/
        }
        </style>
@endsection

@section('content')
<div class="container-bg container-fluid">
    <div class="container-page-1 position-relative">
        <!-- <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-1 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-2 z-0"> -->
        <div class="d-flex align-items-center flex-column">
            <img src="{{ asset('asset2024/main/maniac.png') }}" alt="Logo Maniac" class="w-75 mb-3 z-1">
        </div>
    </div>
    <div class="container-page-2 position-relative">
        <!-- <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-3 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-4 z-0"> -->
        <div class="d-flex align-items-center flex-column">
            <h1 class="text-maniac text-red">WIN UP IDR</h1>
            <h1 class="text-maniac text-red">100 ++ MILLION</h1>
            <img src="{{ asset('asset2024/main/9.png') }}" class="dec-1">
            <div class="register-now">REGISTER NOW</div>
        </div>
    </div>
    <div class="container-page-3 position-relative">
        <!-- <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-5 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-6 z-0"> -->
        <div class="container-axe d-flex justify-content-center ">
            <img src="{{ asset('asset2024/main/axe.png') }}" class="position-absolute axe axe-1">
            <img src="{{ asset('asset2024/main/axe.png') }}" class="position-absolute axe axe-2">
        </div>
        <div class="wrap-axe-poster">
            <div class="container-axe-poster d-flex justify-content-center">
                <img src="{{ asset('asset2024/main/8.png') }}" class="dec-2 dec-2-1">
                <div class="wrap-poster d-flex justify-content-center position-relative">
                    <div class="container-poster d-flex justify-content-center ">
                        <img src="{{ asset('asset2024/main/peserta-contest.png') }}" alt="Poster Maniac" class="poster w-100">
                    </div>
                </div>
                <div class="wrap-dec-2">
                    <img src="{{ asset('asset2024/main/8.png') }}" class="dec-2 dec-2-2 position-absolute">
                </div>
            </div>
        </div>
    </div>
    <div class="container-page-4 position-relative">
        <!-- <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-7 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-8 z-0"> -->
        <div class="container-text-timeline-1-2 d-flex justify-content-center position-absolute">
            <div class="container-text-1 d-flex align-items-center justify-content-center flex-column">
                <p class="timeline-text-1">EARLY BIRD</p>
                <p class="timeline-text-2">7 Mei - 7 Juni</p>
            </div>
            <div class="container-text-2 d-flex align-items-center justify-content-center flex-column">
                <p class="timeline-text-1">Normal</p>
                <p class="timeline-text-2">10 Juni - 6 Juli</p>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-1">
            <h1 class="text-timeline">TIMELINE</h1>
            <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-2">
            <img src="{{ asset('asset2024/main/timeline.png') }}" alt="Timeline Maniac" class="timeline">
        </div>
    </div>
    <div class="container-page-5 position-relative">
        <!-- <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-9 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-10 z-0"> -->
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
        <!-- <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-11 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-12 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-13 z-0">
        <img src="{{ asset('asset2024/main/cloud.png') }}" class="cloud cloud-14 z-0"> -->
        <div class="d-flex justify-content-center flex-column align-items-center ">
            <img src="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-1">
            <h1 class="text-join-now">JOIN NOW</h1>
            <img sr c="{{ asset('asset2024/main/2.png') }}" class="dec-3 dec-3-5">
            <div class="container-video d-flex justify-content-center align-items-center z-1">
                <video src="{{ asset('asset2024/main/after_movie.mp4') }}" controls class="d-flex align-items-center justify-content-center"></video>
            </div>
        </div>
        <div class="container-bottom-home z-0 d-flex justify-content-center ">
            <img src="{{ asset('asset2024/bg-home-bawah.png') }}"  class="bottom-web-home position-absolute z-0">
        </div>
    </div>
</div>
@endsection
