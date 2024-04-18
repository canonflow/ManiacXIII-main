@extends('visitor.welcome')

@section('styles')
    <style>
        .accordion-item {
            border-radius: 5px;
        }

        .accordion-header>button {
            border-radius: 3px;
        }

        .accordion-button:not(.collapsed) {
            background-color: #625f44;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="logo text-center">
               <img src="{{ asset('asset2024/main/maniac.png') }}" class="w-25">            
            </div>
            <h1 class="text-center text-bold pt-3"><strong>FREQUENTLY ASKED QUESTIONS</strong></h1>
            <br>
            <div class="faq">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong>1. Apa itu MANIAC?</strong>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>MANIAC (Multimedia ANd Interactive Art Competition)</strong> adalah lomba berbasis
                                multimedia untuk
                                anak SMA/K sederajat yang mencakup rally games, game concept design, dan game asset design,
                                yang diselenggarakan oleh jurusan Teknik Informatika Program Digital Media Technology
                                Universitas Surabaya.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <strong>2. Apakah MANIAC XIII akan diadakan secara <em>online</em> atau
                                    <em>offline</em>?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong>3. Apa saja tahap dalam MANIAC XIII?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <strong>4. Apakah MANIAC XIII bersifat akademis (seperti mengerjakan soal-soal
                                    pelajaran)?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <strong>5. Apakah bidang lomba yang diujikan hanya tentang Digital Media
                                    Technology?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <strong>6. Apakah akan ada pelatihan sebelum pelaksanaan acara?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <strong>7. <em>Software </em>apa yang digunakan selama lomba?</strong>
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Untuk pengerjaan, <em>software</em> yang digunakan dibebaskan bagi para peserta.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                <strong>8. Bagaimana cara mendaftar menjadi peserta MANIAC XIII?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <strong>9. Bagaimana <em>timeline</em> lomba MANIAC XIII?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <strong>10. Apakah <em>workshop</em> diwajibkan bagi semua peserta lomba MANIAC
                                    XIII?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                <strong>11. Berapakah biaya pendaftaran untuk MANIAC XIII?</strong>
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Pendaftaran untuk mengikuti lomba dikenakan biaya sebesar Rp 10.000,-/tim (Early
                                        bird) &
                                        Rp 25.000,-/tim (Normal), terdapat juga potongan biaya pendaftaran bagi sekolah yang
                                        mendaftarkan 3 tim/lebih sebesar Rp 15.000,-/tim.</li>
                                    <li>
                                        Pendaftaran workshop untuk peserta tidak dikenakan biaya (GRATIS).
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                <strong>12. Apakah terdapat batasan jumlah tim yang mendaftar (dari tiap sekolah)?</strong>
                            </button>
                        </h2>
                        <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Tidak ada.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                <strong>13. Berapa jumlah orang dalam satu tim ?</strong>
                            </button>
                        </h2>
                        <div id="collapse13" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                3 anggota dari sekolah yang sama.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                <strong>14. Dimana saya dapat memperoleh informasi terkait MANIAC XIII?</strong>
                            </button>
                        </h2>
                        <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Website: maniacifubaya.com</li>
                                    <li>IG: maniac_ubaya</li>
                                    <li>OA Line: @994nxsfr</li>
                                    <li>Email: maniac.ubayaa@gmail.com</li>
                                    <li>CP: Caitlyn (WA: 087858998276), Fiorello (WA: 085104914848)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                <strong>15. Dimana saya dapat melihat kisi-kisi perlombaan?</strong>
                            </button>
                        </h2>
                        <div id="collapse15" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Semua informasi mengenai lomba akan diinfokan melalui Instagram MANIAC XIII.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                <strong>16. Apakah wajib mengikuti <em>Technical Meeting</em>?</strong>
                            </button>
                        </h2>
                        <div id="collapse16" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Setiap tim wajib mengirimkan salah satu perwakilan tim.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                <strong>17. Batas pendaftaran MANIAC XIII hingga kapan?</strong>
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
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                <strong>18. Apa saja yang dilombakan pada babak utama penyisihan dan final?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                <strong>19. Apakah kelas 12 boleh mengikuti MANIAC XIII?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                <strong>20. Apakah diperbolehkan jika teman satu kelompok berbeda angkatan?</strong>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                <strong>21. Apakah ada keringanan apabila terdapat gangguan koneksi?</strong>
                            </button>
                        </h2>
                        <div id="collapse21" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Tidak ada, risiko ditanggung peserta masing-masing
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                <strong>22. Apakah diperbolehkan menggantikan rekan satu tim jika mendadak tidak bisa
                                    mengikuti MANIAC XIII?</strong>
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
