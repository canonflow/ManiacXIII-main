@extends('pemain.layout.layout', ['title' => 'Dashboard'])
@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('styles')
    <style>
        body {
            background: url("{{ asset('asset2024') }}/main/peserta-dashboard.png") no-repeat center;
            background-size: cover;
        }

        #decordDataTim {
            transform: scaleX(-1);
        }
    </style>
@endsection

@section('content')
<div class="grid grid-cols-1 gap-8 w-full max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{--  Data Peserta  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md shadow-md data relative">
            <img
                src="{{ asset('asset2024') }}/main/6.png"
                alt=""
                class="absolute hidden lg:block bottom-1 left-2/3 w-28"
                style="transform: translateX(-50%)"
                draggable="false"
            >
            <img
                src="{{ asset('asset2024') }}/main/7.png"
                alt=""
                class="absolute hidden lg:block bottom-1 left-1/3 w-28"
                style="transform: translateX(-50%)"
                draggable="false"
            >
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md mb-3">Data Peserta</h1>
            <table class="table">
                <tbody>
                    @foreach($participants as $participant)
                        <tr>
                            <td class="p-0">Nama</td>
                            <td class="p-0">:</td>
                            <td class="break-words">{{ $participant->name }}</td>
                        </tr>
                        <tr>
                            <td class="p-0">Email</td>
                            <td class="p-0">:</td>
                            <td class="break-words">{{ $participant->email }}</td>
                        </tr>
                        <tr>
                            <td class="p-0">Posisi</td>
                            <td class="p-0">:</td>
                            @php($pos = ($participant->position == 'leader') ? 'ketua' : 'anggota')
                            <td class="break-words">
                                <span class="badge badge-md rounded-lg text-slate-900 {{ $pos == 'ketua' ? 'badge-success text-white' : 'badge-warning ' }} font-semibold">{{ $pos }}</span>
                            </td>
                        </tr>
                        <tr><td colspan="3" class="p-0"><div class="w-full divider"></div></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--  Data Team  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md shadow-md data relative">
            <img
                src="{{ asset('asset2024') }}/main/11.png"
                alt=""
                class="absolute hidden lg:block w-32 bottom-2 right-2"
                id="decordDataTim"
                draggable="false"
            >
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md mb-3">Data Tim</h1>
            <table class="table">
                <tbody>
                <tr>
                    <td class="p-0">Nama Tim</td>
                    <td class="p-0">:</td>
                    <td class="break-words">{{ $team->name }}</td>
                </tr>
                <tr>
                    <td class="p-0">Nama Sekolah</td>
                    <td class="p-0">:</td>
                    <td class="break-words">{{ $team->school_name }}</td>
                </tr>
                <tr>
                    <td class="p-0">Alamat Sekolah</td>
                    <td class="p-0">:</td>
                    <td class="break-all">{{ $team->school_address }}</td>
                </tr>
                <tr>
                    <td class="p-0">Nomor Sekolah</td>
                    <td class="p-0">:</td>
                    <td class="break-words">{{ $team->school_number }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{--  Timeline  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md w-full lg:col-span-1 shadow-md data">
            <img
                src="{{ asset('asset2024') }}/main/1.png"
                alt=""
                class="absolute hidden lg:block bottom-3 left-1/2 w-80"
                style="transform: translateX(-50%)"
                draggable="false"
            >
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md">Timeline</h1>
            <div class="flex flex-col justify-center items-center">
                <ul class="timeline timeline-vertical">
                    <li class="h-32">
                        <div class="timeline-start text-sm mr-2">7 Mei - 7 Juni 2024</div>
                        <div class="timeline-middle badge badge-outline badge-md badge-primary py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="timeline-end timeline-box rounded-lg">Pendaftaran Early Bird Dibuka</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-start text-sm mr-2">10 Juni - 6 Juli 2024</div>
                        <div class="timeline-middle badge badge-outline badge-md badge-primary py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="timeline-end timeline-box rounded-lg">Pendaftaran Normal Dibuka</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-start text-sm mr-2">24 Juni - 15 Juli 2024</div>
                        <div class="timeline-middle badge badge-outline badge-md badge-accent py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                        </div>
                        <div class="timeline-end timeline-box rounded-lg">Pendaftaran Workshop Dibuka</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-start text-sm mr-2">25 Juli 2024</div>
                        <div class="timeline-middle badge badge-outline badge-md badge-base-content py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="timeline-end timeline-box rounded-lg">Penyisihan + TM Semifinal</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-start text-sm mr-2">29 Juli 2024</div>
                        <div class="timeline-middle badge badge-outline badge-md badge-error py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                            </svg>
                        </div>
                        <div class="timeline-end timeline-box rounded-lg">Semifinal + TM Final</div>
                        <hr />
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-start text-sm mr-2">1 Agustus 2024</div>
                        <div class="timeline-middle badge badge-outline badge-md badge-success py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                            </svg>
                        </div>
                        <div class="timeline-end timeline-box rounded-lg">Final</div>
                    </li>
                </ul>
            </div>
        </div>

        {{--  Instruksi Penggunaan  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md w-full lg:col-span-2 shadow-md gap-8 data relative">
            <img
                src="{{ asset('asset2024') }}/main/6.png"
                alt=""
                class="absolute hidden lg:block bottom-3 left-0 w-40"
                draggable="false"
            >
            <img
                src="{{ asset('asset2024') }}/main/7.png"
                alt=""
                class="absolute hidden lg:block bottom-3 right-0 w-40"
                draggable="false"
            >
            <img
                src="{{ asset('asset2024') }}/main/2.png"
                alt=""
                class="absolute hidden lg:block bottom-3 left-1/2 w-52"
                style="transform: translateX(-50%)"
                draggable="false"
            >
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md">Instruksi Penggunaan</h1>
            <div class="flex flex-col gap-3">
                <div class="badge badge-accent rounded-md font-medium text-sm">6 Maret 2024</div>
                <div class="divider"></div>
                <div>
                    <p class="p-0 pb-2 m-o font-bold">Akun</p>
                    <p class="p-0 m-0">Setiap akun hanya bisa login di satu komputer. Apabila login lebih dari satu komputer, maka akun yang login pertama otomatis logout.</p>
                </div>
                <div class="divider"></div>
                <div>
                    <p class="p-0 pb-2 m-o font-bold">Browser</p>
                    <p class="p-0 m-0">Disarankan menggunakan web browser Chrome dan TIDAK disarankan menggunakan web browser Safari dalam penggunaan web ini.</p>
                </div>
                <div class="divider"></div>
                <div>
                    <p class="p-0 pb-2 m-o font-bold">Contest</p>
                    <p class="p-0 m-0">Menu <strong>Contest</strong> digunakan untuk mengumpulkan tugas Workshop berupa link Google Drive dari <strong class="text-bold">File</strong> (<strong class="text-bold text-red-600">BUKAN FOLDER</strong>) yang akan dikumpulkan berupa <strong>PDF</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const datas = gsap.utils.toArray('.data');
        datas.forEach(data => {
            const anim = gsap.fromTo(
                data,
                {
                    autoAlpha: 0,
                    y: 100,
                },
                {
                    duration: 0.6,
                    autoAlpha: 1,
                    y: 0,
                    x: 0,
                }
            );
            ScrollTrigger.create({
                trigger: data,
                animation: anim,
            });
        });
    </script>
@endsection
