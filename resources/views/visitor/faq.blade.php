@extends('visitor.welcome')

@section('styles')
    <style>
        .accordion-header>button {
            border-radius: 20px;
        }

        .accordion-button:not(.collapsed) {
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .accordion-button {
            background-color: #a67563;
            color: white;
            font-family: Montserrat;
            font-weight: bold;

        }

        .accordion-button:not(.collapsed) {
            background-color: #a67563;
            color: #fff;
        }

        .bg-faq {
            background-color: #a67563;
        }

        .accordion-body {
            background-color: #7f4c42;
            color: white;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            font-family: Montserrat;
        }

        h1 {
            font-family: Montserrat;
            text-shadow: 1px 1px 1px #620706;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container py-5">
            <h1 class="text-center text-bold py-2"><strong>FREQUENTLY ASKED QUESTIONS</strong></h1>
            <br>
            <div class="faq">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" data-aos="fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Apa itu MANIAC?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>MANIAC (Multimedia And Interactive Art Competition)</strong> adalah lomba berbasis
                                multimedia untuk
                                anak SMA/K sederajat yang mencakup rally games, game concept design, dan game asset design,
                                yang diselenggarakan oleh jurusan Teknik Informatika Program Digital Media Technology
                                Universitas Surabaya.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="50">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>
                                    Apakah MANIAC XIII akan diadakan
                                    secara&nbsp;<em>online</em>&nbsp;atau&nbsp;<em>offline</em>?
                                </span>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <em>Offline</em> di Universitas Surabaya untuk <em>technical meeting</em>, babak penyisihan,
                                babak
                                semi final,
                                dan babak final.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apa saja tahap dalam MANIAC XIII?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Workshop</li>
                                    <li><em>Technical Meeting</em> Babak Semi Final</li>
                                    <li>Babak Penyisihan</li>
                                    <li>Babak Semi Final</li>
                                    <li><em>Technical Meeting</em> Babak Final</li>
                                    <li>Babak Final</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="150">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Apakah MANIAC XIII bersifat akademis (seperti mengerjakan soal-soal
                                pelajaran)?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Tidak, MANIAC XIII berfokus pada bidang Multimedia. Bidang akademis hanya akan diuji di
                                beberapa pos pada <em>rally games</em>.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Apakah bidang lomba yang diujikan hanya tentang Digital Media
                                Technology?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                MANIAC berfokus pada 2 bidang Multimedia, yaitu <em>game concept design
                                </em> dan <em>game asset design</em>.
                                Namun terdapat bidang multimedia selain game pada babak semifinal.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Apakah akan ada pelatihan sebelum pelaksanaan acara?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Ya, akan ada Workshop yang bersifat <strong>WAJIB </strong> bagi <strong>semua anggota
                                    tim</strong> yaitu
                                <em>Workshop Game Concept Design</em>
                                & <em>Workshop Game Asset Design</em> pada tanggal 25 Juli 2024.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <span>
                                    <em>Software</em>&nbsp;apa yang digunakan selama lomba?
                                </span>
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Untuk pengerjaan, <em>software</em> yang digunakan dibebaskan bagi para peserta.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="350">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Bagaimana cara mendaftar menjadi peserta MANIAC XIII?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Pendaftaran dilakukan secara <em>online</em> dengan mengisi form pendaftaran yang tersedia
                                di website
                                <strong>maniacifubaya.com</strong>.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <span>
                                    Bagaimana&nbsp;<em>timeline</em>&nbsp;lomba MANIAC XIII?
                                </span>
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><em>Workshop Game Asset Design</em> (25 Juli 2024)</li>
                                    <li><em>Technical Meeting</em> Babak Semi Final (25 Juli 2024)</li>
                                    <li>Babak Penyisihan (25-26 Juli 2024)</li>
                                    <li>Babak Penjurian (26 - 28 Juli 2024)</li>
                                    <li>Pemberitahuan Semifinalis (28 Juli 2024)</li>
                                    <li>Babak Semifinal (29 Juli 2024)</li>
                                    <li><em>Technical Meeting</em> Babak Final (29 Juli 2024)</li>
                                    <li>Babak Final (1 Agustus 2024)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="450">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <span>
                                    Apakah&nbsp;<em>workshop</em>&nbsp;diwajibkan bagi semua peserta lomba MANIAC
                                    XIII?
                                </span>
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>WAJIB</strong>, <em>workshop</em> terbuka secara <strong>GRATIS</strong> hanya untuk
                                peserta MANIAC
                                dan akan
                                menjadi penyisihan
                                bagi peserta MANIAC.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Berapakah biaya pendaftaran untuk MANIAC XIII?
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Pendaftaran untuk mengikuti lomba dikenakan biaya sebesar Rp 50.000,-/tim (Early
                                        bird) &
                                        Rp 75.000,-/tim (Normal), terdapat juga potongan biaya pendaftaran bagi sekolah yang
                                        mendaftarkan 3 tim/lebih menjadi Rp 50.000,-/tim.</li>
                                    <li>
                                        Pendaftaran workshop untuk peserta tidak dikenakan biaya (GRATIS).
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="550">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                <span>
                                    Apakah terdapat batasan jumlah tim yang mendaftar (dari tiap sekolah)?
                                </span>
                            </button>
                        </h2>
                        <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Tidak ada.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                Berapa jumlah orang dalam satu tim ?
                            </button>
                        </h2>
                        <div id="collapse13" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                3 anggota dari sekolah yang sama.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="650">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                Dimana saya dapat memperoleh informasi terkait MANIAC XIII?
                            </button>
                        </h2>
                        <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Website: maniacifubaya.com</li>
                                    <li>IG: maniac_ubaya</li>
                                    <li>OA Line: @994nxsfr</li>
                                    <li>Email: maniac.ubayaa@gmail.com</li>
                                    <li>CP: Caitlyn (WA: 085951465290), Fiorello (WA: 085104914848)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="700">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                Dimana saya dapat melihat kisi-kisi perlombaan?
                            </button>
                        </h2>
                        <div id="collapse15" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Semua informasi mengenai lomba akan diinfokan melalui Instagram MANIAC XIII.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="750">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                <span>
                                    Apakah wajib mengikuti&nbsp;<em>Technical Meeting</em>?
                                </span>
                            </button>
                        </h2>
                        <div id="collapse16" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Setiap tim wajib mengirimkan salah satu perwakilan tim.
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- <div class="accordion-item" data-aos="fade-up" data-aos-delay="800">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                Batas pendaftaran MANIAC XIII hingga kapan?
                            </button>
                        </h2>
                        <div id="collapse17" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>7 Mei - 7 Juni 2024 (Open Registration Lomba <em>Early Bird</em>)</li>
                                    <li>10 Juni - 6 Juli 2024 (Open Registration Lomba Normal)</li>
                                    <li>24 Juni - 15 Juli 2024 (Open Registration Workshop)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br> -->
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="850">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                Apa saja yang dilombakan pada babak utama penyisihan dan final?
                            </button>
                        </h2>
                        <div id="collapse18" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Penyisihan: Tugas <em>Workshop</em></li>
                                    <li>Semi Final: <em>Rally Games</em></li>
                                    <li>Final: <em>Game concept design</em> dan <em>Game asset design</em></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="900">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                Apakah kelas 12 boleh mengikuti MANIAC XIII?
                            </button>
                        </h2>
                        <div id="collapse19" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Untuk kelas 12 angkatan lulus Tahun Ajaran 2023/2024 tidak diperbolehkan, sedangkan untuk
                                angkatan yang naik ke kelas 12 pada Tahun Ajaran 2024/2025 diperbolehkan, asalkan mendapat
                                izin dari sekolah dan memiliki bukti status kesiswaan.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="950">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                Apakah diperbolehkan jika teman satu kelompok berbeda angkatan?
                            </button>
                        </h2>
                        <div id="collapse20" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Diperbolehkan, dengan syarat tetap berada di jenjang yang sama (SMA/K sederajat), dan untuk
                                kelas 12 mengikuti ketentuan pada pertanyaan sebelumnya (no.19).
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="1000">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                Apakah ada keringanan apabila terdapat gangguan koneksi?
                            </button>
                        </h2>
                        <div id="collapse21" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Tidak ada, risiko ditanggung peserta masing-masing
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="1050">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                Apakah diperbolehkan menggantikan rekan satu tim jika mendadak tidak bisa
                                mengikuti MANIAC XIII?
                            </button>
                        </h2>
                        <div id="collapse22" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Diperbolehkan, namun ada batasan waktu, yaitu 2 minggu sebelum hari diadakannya pelaksanaan
                                lomba.
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
