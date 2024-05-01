@extends('admin.layout.index', ['pageActive' => 'admin.registration', 'pageTitle' => 'Registration'])

@section('styles')
    <style>
        .swiper-pagination-bullet {
            background-color: #64748b !important;
            width: 0.625rem !important;
            height: 0.625rem !important;
        }

        .swiper-pagination-bullet-active {
            background-color: #7dd3fc !important;
        }

        .payment-oke {
            display: none;
        }

        .payment-not-oke {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .divider {
            color: oklch(var(--s)) !important;
        }

        .divider::before, .divider::after {
            background-color: oklch(var(--b3)) !important;;
        }
    </style>
@endsection

@section('content')
    <div class="text-sm breadcrumbs gap-1 flex items-center">
        <h1 class="text-xl font-semibold">Admin</h1>
        <div class="divider divider-horizontal mx-0"></div>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.teams.index') }}" class="text-primary font-bold">Registration</a></li>
        </ul>
    </div>

    <div class="flex flex-col justify-center content-center w-full bg-base-200 p-3 rounded-lg">
        {{--    Alert    --}}
        @if(session()->has('deactivateSuccess'))
        <div role="alert" class="alert alert-success mb-3 rounded-md">
            <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Berhasil deactivate <strong>{{ session()->get('deactivateSuccess') }}</strong></span>
            </div>
        </div>
        @endif

        {{--    Header    --}}
        <div class="flex flex-col gap-y-4">
            <h2 class="text-lg font-medium">Search & Filter</h2>
            {{--      Search      --}}
            <form class="grid grid-cols-1 md:grid-cols-2 items-start w-full justify-between" method="GET" action="{{ route('admin.teams.search') }}">
                {{--  Status  --}}
                <div class="flex flex-col">
                    <p class="text-sm mb-1.5">Status</p>
                    <div class="flex flex-row gap-x-3">
                        <label class="label cursor-pointer gap-x-1">
                            <input type="checkbox" class="checkbox checkbox-sm" name="status[]" {{ in_array('waiting', request('status')) ? ' checked' : '' }} value="waiting">
                            <span class="label-text">Waiting</span>
                        </label>
                        <label class="label cursor-pointer gap-x-1">
                            <input type="checkbox" class="checkbox checkbox-sm checkbox-warning" name="status[]" {{ in_array('unverified', request('status')) ? ' checked' : '' }} value="unverified">
                            <span class="label-text">Unverified</span>
                        </label>
                        <label class="label cursor-pointer gap-x-1">
                            <input type="checkbox" class="checkbox checkbox-sm checkbox-success" name="status[]" {{ in_array('verified', request('status')) ? ' checked' : '' }} value="verified">
                            <span class="label-text">Verified</span>
                        </label>
                    </div>
                </div>

                {{--    Input    --}}
                <div class="place-self-end mt-5 lg:mt-0">
                    <div class="text-sm mb-1.5">Search by</div>
                    <div class="flex flex-wrap">
                        <select class="select select-bordered rounded-none rounded-l-md" name="search">
                            <option value="teams.name" selected>Team</option>
                            <option value="participants.name">Peserta</option>
                            <option value="teams.school_name">Sekolah</option>
                        </select>
                        <div>
                            <div>
                                <input class="input input-bordered rounded-none" placeholder="Search" name="name" value="{{ session('name') ?? '' }}" />
                            </div>
                        </div>
                        <div class="indicator">
                            <button class="btn btn-primary join-item sm:btn-md rounded-l-none" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            @if(session()->has('successful'))
            <div role="alert" class="alert alert-success rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="font-medium text-slate-200">{{ session()->get('successful') }}</span>
            </div>
            @elseif(session()->has('unsuccessful'))
            <div role="alert" class="alert alert-error rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="font-medium text-slate-200">{{ session()->get('unsuccessful') }}</span>
            </div>
            @endif
        </div>

        <div class="divider my-8">
            Teams
        </div>

        {{--    Teams    --}}
        <div class="overflow-auto" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead>
                <tr>
                    <th width="5%" class="text-center">ID</th>
                    <th width="20%" class="text-center">Nama</th>
                    <th width="10%" class="text-center">Status</th>
                    <th width="30%" class="text-center">Peserta</th>
                    <th width="30%" class="text-center">Sekolah</th>
                    <th width="5%" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody id="tBody">
                    @foreach($teams as $team)
                    <tr>
                        @php
                        if ($team['status'] == 'verified') $badgeColor = 'badge badge-success';
                        else if ($team['status'] == 'unverified') $badgeColor = 'badge badge-warning';
                        else $badgeColor = 'badge badge-neutral';
                        @endphp
                        <td width="5%" class="text-center">{{ $team['id'] }}</td>
                        <td width="20%" class="text-center">{{ $team['name'] }}</td>
                        <td width="10%" class="text-center">
                            <div class="{{ $badgeColor }} font-medium">{{ $team['status'] }}</div>
                        </td>
                        <td width="30%">
                            <ul>
                                @foreach($team->participants as $participant)
                                    <li class="mb-2">{{ $participant->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td width="30%" class="text-center">{{ $team['school_name'] }}</td>
                        <td width="5%">
                            <div class="flex flex-col gap-2 py-1">
                                @if($team->status != 'waiting')
                                <button class="btn btn-info btn-sm rounded-md" onclick="getTeamData('{{ $team->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </button>
                                @endif
                                <button class="btn btn-error btn-sm rounded-md" onclick="deactivateTeam('{{ $team['name'] }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--      Pagination      --}}
        <div class="mt-6">
            {{ $teams->onEachSide(1)->withQueryString()->links() }}
        </div>

        {{--    Modal Deactivated    --}}
        <dialog id="modalDeactivated" class="modal">
            <div class="modal-box rounded-md p-4">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <form action="{{ route('admin.teams.deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" id="deactivatedTeam" name="team">
                    <h3 class="font-bold text-xl lg:text-2xl">Deactivate Team</h3>
                    <p class="py-4">Apakah anda yakin untuk menonaktifkan tim ini?</p>
                    <div class="divider my-2"></div>
                    <div class="grid grid-cols-3">
                        <button class="btn btn-error col-span-1 col-end-4 font-medium" type="submit">Deactivate</button>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        {{--    Modal Team Data    --}}
        <dialog id="modalTeamData" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box relative">
                <h3 class="font-bold text-2xl sticky top-0 bg-slate-800 rounded-sm shadow-xl py-1 md:py-3 mb-3 text-slate-200 text-center" id="namaTim"></h3>
                <div class="overflow-auto h-full flex flex-col items-center mb-12 gap-2">
                    <p class="font-medium text-xl text-success">Bukti Transfer</p>
                    <img src="" alt="Bukti Transfer" class="w-3/4" id="fotoBuktiTransfer">
                    <div class="bg-warning w-full py-5 payment-not-ok text-black font-semibold rounded-sm text-lg" id="paymentNotOk">Tim belum mengunggah foto pembayaran!</div>
                </div>
                {{--   Swiper   --}}
                <p class="font-medium text-xl flex flex-col items-center mb-3 text-warning">Foto Peserta</p>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="overflow-auto h-full flex flex-col items-center mb-8 gap-3">
                                <img src="" alt="foto-leader" class="w-3/4" id="fotoLeader">
                                <p class="font-medium text-lg" id="namaLeader"></p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="overflow-auto h-full flex flex-col items-center mb-8 gap-3">
                                <img src="" alt="foto-anggota-1" class="w-3/4" id="fotoAnggota1">
                                <p class="font-medium text-lg" id="namaAnggota1"></p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="overflow-auto h-full flex flex-col items-center mb-8 gap-3">
                                <img src="" alt="foto-anggota-2" class="w-3/4" id="fotoAnggota2">
                                <p class="font-medium text-lg" id="namaAnggota2"></p>
                            </div>
                        </div>
                    </div>
                    {{--  Pagination  --}}
                    <div class="swiper-pagination"></div>
                </div>
                <div class="flex flex-col justify-center gap-4">
                    <form action="" method="POST" id="formVerification">
                        @csrf
                        <button class="btn btn-success action w-full rounded-md" id="btnVerif">Verifikasi</button>
                    </form>
                    <form onclick="event.preventDefault(); modalTeamData.close()">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn btn-error w-full action rounded-md">Close</button>
                    </form>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>
@endsection

@section('scripts')
    <script>
        let deactivatedModal = document.getElementById('modalDeactivated');
        let deactivatedTeam = document.getElementById('deactivatedTeam');

        // Modal Team Data
        const teamDataModal = document.getElementById('modalTeamData');
        const namaTim = document.getElementById('namaTim');
        const fotoBuktiTransfer = document.getElementById('fotoBuktiTransfer');
        const fotoLeader = document.getElementById('fotoLeader');
        const namaLeader = document.getElementById('namaLeader');
        const fotoAnggota1 = document.getElementById('fotoAnggota1');
        const namaAnggota1 = document.getElementById('namaAnggota1');
        const fotoAnggota2 = document.getElementById('fotoAnggota2');
        const namaAnggota2 = document.getElementById('namaAnggota2');
        const paymentNotOk = document.getElementById('paymentNotOk');
        const btnVerif = document.getElementById('btnVerif');
        const formVerification = document.getElementById('formVerification');
        // teamDataModal.showModal();

        const deactivateTeam = (team) => {
            deactivatedTeam.value = team;
            deactivatedModal.showModal();
        }

        const getTeamData = (team_id) => {
            $.ajax({
                url: '{{ route('admin.teams.data') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'team_id': team_id,
                },
                success: function (data) {
                    // console.log(data.team);
                    // for (const participant of data.team.participants) {
                    //     console.log(participant);
                    // }
                    const team = data.team;
                    namaTim.innerHTML = team.name;
                    if (team.payment_photo) {
                        fotoBuktiTransfer.setAttribute('src', `{{ asset('storage') }}/${team.payment_photo}`);
                        fotoBuktiTransfer.style.display = 'block';
                        paymentNotOk.classList.remove('payment-not-oke');
                        paymentNotOk.classList.add('payment-oke');
                        btnVerif.style.display = 'block';
                        if (team.status == 'unverified') {
                            formVerification.setAttribute('action', `{{ route('admin.teams.index') }}/${team.name}/verification`);
                            btnVerif.innerHTML = 'Verifikasi';
                            btnVerif.classList.remove('btn-warning');
                            btnVerif.classList.add('btn-success');
                        } else {
                            formVerification.setAttribute('action', `{{ route('admin.teams.index') }}/${team.name}/unverified`);
                            btnVerif.innerHTML = 'Unverifikasi';
                            btnVerif.classList.remove('btn-success');
                            btnVerif.classList.add('btn-warning');
                        }
                    } else {
                        paymentNotOk.classList.remove('payment-oke');
                        paymentNotOk.classList.add('payment-not-oke');
                        fotoBuktiTransfer.style.display = 'none';
                        btnVerif.style.display = 'none';
                    }

                    if (team.participants.length == 3) {
                        fotoLeader.setAttribute('src', `{{ asset('storage') }}/${team.participants[0].student_photo}`)
                        fotoAnggota1.setAttribute('src', `{{ asset('storage') }}/${team.participants[1].student_photo}`)
                        fotoAnggota2.setAttribute('src', `{{ asset('storage') }}/${team.participants[2].student_photo}`)
                        namaLeader.innerHTML = team.participants[0].name;
                        namaAnggota1.innerHTML = team.participants[1].name;
                        namaAnggota2.innerHTML = team.participants[2].name;
                    } else {
                        fotoLeader.setAttribute('src', '');
                        fotoAnggota1.setAttribute('src', '');
                        fotoAnggota2.setAttribute('src', '');
                        namaLeader.innerHTML = "-----";
                        namaAnggota1.innerHTML = "-----";
                        namaAnggota2.innerHTML = "-----";
                    }
                    teamDataModal.showModal();
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        }
    </script>

    {{--  Swiper  --}}
    @vite('resources/js/swiper.js')
    <script type="module">
        const swiper = new Swiper('.swiper', {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 3,
                slideShadows: true
            },
            keyboard: {
                enabled: true
            },
            mousewheel: {
                thresholdDelta: 70
            },
            // loop: true,
            speed: 600,
            autoplay: {
                delay: 2800,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

        })

        console.log(swiper);
    </script>
@endsection
