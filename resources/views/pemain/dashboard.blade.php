@extends('pemain.layout.layout', ['title' => 'Dashboard'])

@section('content')
<div class="grid grid-cols-1 gap-8 w-full max-w-7xl border border-warning">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{--  Data Anggota  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md">
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md mb-3">Data Anggota</h1>
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
                                <span class="badge badge-md rounded-lg text-slate-900 {{ $pos == 'ketua' ? 'badge-success ' : 'badge-warning ' }} font-semibold">{{ $pos }}</span>
                            </td>
                        </tr>
                        <tr><td colspan="3" class="p-0"><div class="w-full divider"></div></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--  Data Team  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md">
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
        <div class="bg-base-200 flex flex-col p-4 rounded-md w-full lg:col-span-1">
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md">Timeline</h1>
            <div class="flex flex-col justify-start items-start">
                <ul class="timeline timeline-vertical">
                    <li class="h-32">
                        <div class="timeline-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="timeline-end timeline-box">First Macintosh computer</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="timeline-end timeline-box">iMac</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="timeline-end timeline-box">iPod</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="timeline-end timeline-box">iPhone</div>
                        <hr/>
                    </li>
                    <li class="h-32">
                        <hr/>
                        <div class="timeline-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="timeline-end timeline-box">Apple Watch</div>
                    </li>
                </ul>
            </div>
        </div>

        {{--  Instruksi Penggunaan  --}}
        <div class="bg-base-200 flex flex-col p-4 rounded-md w-full lg:col-span-2 gap-8">
            <h1 class="text-md md:text-xl font-semibold bg-base-300 py-2 px-4 text-center rounded-md">Instruksi Penggunaan</h1>
            <div class="flex flex-col gap-3">
                <div class="badge badge-accent rounded-md text-slate-50  font-medium text-sm">6 Maret 2024</div>
                <div class="divider"></div>
                <div>
                    <p class="p-0 pb-2 m-o font-medium text-slate-200">Akun</p>
                    <p class="p-0 m-0 font-light text-slate-100 break-words">Setiap akun hanya bisa login di satu komputer. Apabila login lebih dari satu komputer, maka akun yang login pertama otomatis logout.</p>
                </div>
                <div class="divider"></div>
                <div>
                    <p class="p-0 pb-2 m-o font-medium text-slate-200">Browser</p>
                    <p class="p-0 m-0 font-light text-slate-100 break-words">Disarankan menggunakan web browser Chrome dan TIDAK disarankan menggunakan web browser Safari dalam penggunaan web ini.</p>
                </div>
                <div class="divider"></div>
                <div>
                    <p class="p-0 pb-2 m-o font-medium text-slate-200">Contest</p>
                    <p class="p-0 m-0 font-light text-slate-100 break-words">Menu <strong>Contest</strong> digunakan untuk mengumpulkan tugas Workshop berupa link Google Drive dari <strong class="text-bold">File</strong> (<strong class="text-bold text-error">BUKAN FOLDER</strong>) yang akan dikumpulkan berupa <strong>PDF</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
