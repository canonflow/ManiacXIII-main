@extends('visitor.welcome')

@section('styles')
    <style>
        .box-container {
            width: 70%; 
            margin: 0 auto; 
        }

        .floating-box {
            padding: 20px; 
        }

        .sub {
            background-color: #a67563;
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
            font-family: Montserrat;
            font-weight: bold;
            font-size: 36px;
            text-align: center;
            padding: 10px; 
        }

        .text {
            background-color: #7f4c42;
            color: white;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            font-family: Montserrat;
            text-align: justify;
            padding: 10px; 
        }

        h1 {
            font-family: Cinzel;
            font-weight: bold;
            text-align: center;
            text-shadow: 1px 1px 1px #620706; 
        }

        .button {
            display: inline-block; 
            padding: 10px 60px; 
            background-color: blue; 
            color: white; 
            text-align: center; 
            text-decoration: none; 
            font-family: Montserrat;
            font-weight: 500;
            border-radius: 20px;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .centered {
            text-align: center; 
        }
    </style>
@endsection

@section('content')
    <div> 
        <h1>COMPETITIONS</h1>
        <br>
        <div class="box-container">
            <div class="floating-box">
                <div class="sub">PENYISIHAN</div>
                <div class="text">
                    Babak penyisihan MANIAC XIII berupa workshop yang dibawakan langsung oleh
                    salah satu game developer ternama di Indonesia. Terdapat dua jenis workshop
                    yang diselenggarakan, yaitu Game Asset Design yang berfokus pada cara
                    pembuatan aset di suatu permainan dan Game Concept Design yang membahas
                    bagaimana cara merancang konsep sebuah permainan. Pada akhir workshop,
                    peserta akan diberikan tugas pengumpulan karya yang akan dinilai dalam babak
                    penyisihan. Dengan adanya workshop, diharapkan peserta dapat
                    mengimplementasikan ilmu yang didapat dan bisa menjadi bekal ke babak final
                    nantinya.
                </div>
                <br>
                <div class="sub">SEMIFINAL</div>
                <div class="text">
                    Babak semi final MANIAC XIII akan diadakan di Fakultas Teknik Universitas
                    Surabaya. Babak penyisihan akan terdiri dari Rally Games dan Game Besar yang
                    wajib diikuti oleh setiap tim. Pada Rally Games akan terdapat pos-pos permainan
                    yang harus diselesaikan dengan strategi dan kerja sama tim. Terdapat pula pos
                    yang berisi pertanyaan teori mengenai game dan multimedia dasar, serta
                    pertanyaan logika dan juga pos yang menguji kerja sama tim. Pada Game Besar,
                    setiap tim akan bermain dan berkompetisi untuk memenangkan permainan.
                </div>
                <br>
                <div class="sub">FINAL</div>
                <div class="text">
                    Babak Final MANIAC XIII akan diadakan secara on-site di Universitas Surabaya.
                    Topik yang akan dilombakan pada babak final adalah Game Concept Design dan
                    Game Asset Design.

                    Game Concept Design adalah cabang lomba untuk membuat sebuah konsep
                    cerita atau alur dalam sebuah game. Peserta diharapkan dapat membuat
                    konsep game yang sesuai dengan tema.

                    Game Asset Design adalah cabang lomba untuk mendesain aset-aset yang
                    dibutuhkan dalam game tersebut. Peserta diharapkan dapat mendesain aset
                    game semenarik mungkin sesuai dengan alur dan konsep yang telah dibuat.
                    Setiap tim akan mempresentasikan hasil kerjanya pada Babak Final. Peserta
                    harus bisa memberikan penjelasan mengenai konsep game beserta asetnya
                    yang menarik dan kreatif sesuai dengan tema yang ditentukan.
                </div>
                <br>
            </div>
        </div>
        <br>
        <h1>GUIDEBOOK</h1>
        <br>
        <div class="centered">
            <a href="https://drive.google.com/" class="button" target="_blank">DOWNLOAD</a>
        </div>
    </div>
@endsection
