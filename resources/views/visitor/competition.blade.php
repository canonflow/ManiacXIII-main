@extends('visitor.welcome')

@section('styles')
    <style>
        :root {
            /* Variabel ukuran font untuk responsivitas */
            --base-font-size: 16px;
            /* Ukuran dasar */
            --font-large: 2em;
            /* Besar */
            --font-medium: 1.5em;
            /* Sedang */
            --font-small: 1em;
            /* Kecil */

            /* Variabel warna */
            --color-bg: #a67563;
            --color-fg: white;
            --color-primary: #590707;
            --color-primary-dark: #741010;
        }

        .container-bg {
            {{-- background-image: url("{{ asset('asset2024/main/bg-transparent.png') }}"); --}} background-image: url("{{ asset('asset2024/bg-home.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container-page {
            padding-top: 3%;
            text-align: center;
        }

        .box-container {
            width: 70%;
            margin: 0 auto;
        }

        .sub {
            background-color: var(--color-bg);
            color: var(--color-fg);
            border-radius: 20px 20px 0 0;
            font-size: var(--font-large);
            padding: 10px;
            font-weight: bold;
            text-align: center;
            font-family: 'Montserrat';
        }

        .text {
            background-color: #7f4c42;
            color: var(--color-fg);
            border-radius: 0 0 20px 20px;
            padding: 30px;
            text-align: justify;
            font-family: 'Montserrat';
            font-weight: bold;
            font-size: var(--font-medium);
        }

        h1 {
            font-family: 'Cinzel';
            font-weight: bold;
            text-align: center;
            text-shadow: 1px 1px 1px #620706;
        }

        .button {
            display: inline-block;
            padding: 10px 60px;
            background-color: var(--color-primary);
            color: var(--color-fg);
            text-decoration: none;
            font-family: 'Montserrat';
            font-weight: bold;
            border-radius: 20px;
            font-size: var(--font-medium);
            border-bottom: 1px solid white;
            transition: all 0.3s;
        }

        .button:hover {
            background-color: var(--color-primary-dark);
        }

        @media (max-width: 768px) {
            .box-container {
                width: 90%;
            }

            .button {
                padding: 8px 40px;
                font-size: var(--font-medium);
            }
        }

        @media (max-width: 480px) {
            .box-container {
                width: 100%;
            }

            .button {
                padding: 6px 30px;
                font-size: var(--font-small);
            }
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container py-5"> 
        <h1 class="fs-1">COMPETITIONS</h1>
        <br>
        <div class="box-container">
            <div data-aos="fade-up" data-aos-delay="100">
                @foreach (['PENYISIHAN', 'SEMI FINAL', 'FINAL'] as $section)
                    <div class="sub fs-4">{{ $section }}</div>
                    <div class="text fs-6 fw-normal text-center">
                        @if ($section == 'PENYISIHAN')
                            Babak penyisihan MANIAC XIII berupa workshop yang dibawakan langsung oleh salah satu game
                            developer ternama di Indonesia.<br /><br />Terdapat dua jenis workshop yang diselenggarakan,
                            yaitu Game Asset Design yang berfokus pada cara pembuatan aset di suatu permainan dan Game
                            Concept Design yang membahas bagaimana cara merancang konsep sebuah permainan. Peserta akan
                            diberikan tugas di akhir workshop.
                        @elseif ($section == 'SEMI FINAL')
                            Babak semi final MANIAC XIII akan diadakan di Fakultas Teknik Universitas Surabaya. Semi
                            final terdiri dari Rally Games dan Game Besar yang harus diselesaikan dengan strategi dan
                            kerja sama tim.
                        @else
                            Babak Final MANIAC XIII akan diadakan secara on-site di Universitas Surabaya.
                            Topik yang akan dilombakan pada babak final adalah Game Concept Design dan
                            Game Asset Design.
                            <br><br>
                            Game Concept Design adalah cabang lomba untuk membuat sebuah konsep
                            cerita atau alur dalam sebuah game. Peserta diharapkan dapat membuat
                            konsep game yang sesuai dengan tema.
                            <br><br>
                            Game Asset Design adalah cabang lomba untuk mendesain aset-aset yang
                            dibutuhkan dalam game tersebut. Peserta diharapkan dapat mendesain aset
                            game semenarik mungkin sesuai dengan alur dan konsep yang telah dibuat.
                            Setiap tim akan mempresentasikan hasil kerjanya pada Babak Final. Peserta
                            harus bisa memberikan penjelasan mengenai konsep game beserta asetnya
                            yang menarik dan kreatif sesuai dengan tema yang ditentukan.
                        @endif
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
        <br>
    {{--        <div class="d-flex flex-column align-items-center mb-2"> --}}
    {{--            <h1>GUIDEBOOK</h1> --}}
    {{--            <br> --}}
    {{--            <a href="{{ asset('asset2024/main/guidebook.pdf') }}" download="Guidebook MANIAC XIII.pdf"> --}}
    {{--                <button class="button btn-lg">Download</button> --}}
    {{--            </a> --}}
    {{--        </div> --}}
    </div>
</div>
@endsection
