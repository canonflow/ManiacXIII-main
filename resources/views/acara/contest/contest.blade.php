@extends('acara.layout.index', ['title' => 'Contest'])

@section('cdn')
    {{--  jQuery  --}}
    <script src="{{ asset('js') }}/jquery.min.js"></script>

    {{--  GSAP  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--  Notyf  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    {{--  Select2  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('styles')
    <style>
        .action:hover {
            color: white !important;
        }

        .select2-container--default .select2-selection--multiple {
            /*background-color: oklch(var(--nc)) !important;*/
            background-color: white !important;
            border-color: oklch(var(--nc)) !important;
        }

        /* Dropdown */
        .select2-container--open .select2-dropdown--below {
            padding: 0.5rem 0.3rem;
        }

        /* Choices */
        .select2-results__option--selectable {
            border-radius: 0.225rem;
            background-color: #e2e8f0;
            color: #0f172a;
        }

        .select2-results__option--selectable:not(:last-child) {
            margin-bottom: 0.215rem;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: oklch(var(--a)) !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: oklch(var(--b2));
            border-radius: 0.2rem;
            border: none;
            font-size: 0.8rem; /* 14px */
            line-height: 1.25rem; /* 20px */
            padding-right: 0.3rem;
            font-weight: bold;
        }

        /* Option Select2 remove */
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            border: none;
            border-radius: 0;
            /*background-color: #94a3b8;*/
            background-color: oklch(var(--b1));
            color: oklch(var(--b3));
            font-weight: bold;
        }

        /* Selected Option */
        .select2-container--default .select2-results__option--selected {
            /*background-color: #334155;*/
            background-color: #A67563;
            color: white;
        }
    </style>
@endsection

@section('content')
    @php($author = auth()->user()->acara->name)
    <div class="grid grid-cols-1 gap-10 w-full max-w-7xl">
        {{--   Introduction    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-primary-content bg-primary p-5 font-medium rounded-t-lg">🏆 {{ $contest->name }} 🏆</h1>
            <div class="card-body bg-accent rounded-b-lg">
                <h2 class="text-xl font-medium text-white mb-3">Selamat Datang, <span class="text-warning">{{ $author }}</span></h2>
                <p class="text-slate-100 pb-3 sm:pb-0 break-words">
                    Anda dapat menambahkan peserta dan melihat submission peserta pada Contest <strong class="text-base-100">{{ $contest->name }}</strong>.
                </p>
                <div role="alert" class="alert rounded-md py-2">
                    <span>Mohon lakukan refresh page untuk update data contest.</span>
                </div>
                @if(session()->has('addSuccess'))
                    <div role="alert" class="alert alert-success mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-white"><strong>{{ session()->get('addSuccess') }}</strong></span>
                        </div>
                    </div>
                @elseif(session()->has('deleteSuccess'))
                    <div role="alert" class="alert alert-success mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-white">Berhasil Menghapus Tim <strong>{{ session()->get('deleteSuccess') }}</strong></span>
                        </div>
                    </div>
                @elseif(session()->has('unauthorized'))
                    <div role="alert" class="alert alert-error mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><strong>{{ session()->get('unauthorized') }}</strong></span>
                        </div>
                    </div>
                @elseif(session()->has('addScoreSuccess'))
                    <div role="alert" class="alert alert-success mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-white"><strong>{{ session()->get('addScoreSuccess') }}</strong></span>
                        </div>
                    </div>
                @endif

                @error("score")
                    <div role="alert" class="alert alert-error mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><strong>{{ $message }}</strong></span>
                        </div>
                    </div>
                @enderror
            </div>
        </div>

        {{--    Daftar Peserta    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-primary p-5 font-medium rounded-t-lg text-primary-content">List of Contestants</h1>
            <div class="card-body bg-accent rounded-b-lg">
                {{--  Select Team  --}}
                <div class="flex flex-col">
                    <form action="{{ route('acara.contest.contestant.store', $contest->slug) }}" method="POST">
                        <p class="text-sm dark:text-white light:text-black">Team:</p>
                        @csrf
                        <select id="addTeam" name="teams[]" multiple="multiple" class="w-full max-w-xs">
                            @foreach($unregisteredTeams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-xs btn-success ml-2 rounded-md action pt-3 pb-6 px-4">Tambah</button>
                    </form>
                </div>

                {{--  Table  --}}
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-secondary">
                            <th width="10%" class="text-center">ID</th>
                            <th width="40%" class="text-center">Tim</th>
                            <th width="40%" class="text-center">Sekolah</th>
                            <th width="10%" class="text-center">Hapus</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($contestants) != 0)
                            @foreach($contestants as $contestant)
                                <tr>
                                    <td width="10%" class="text-center">{{ $contestant->id }}</td>
                                    <td width="40%" class="text-center font-bold">{{ $contestant->name }}</td>
                                    <td width="40%" class="text-center">{{ $contestant->school_name }}</td>
                                    <td width="10%" class="text-center">
                                        <button
                                            class="btn text-primary-content btn-error rounded-md px-5 py-0 font-bold action"
                                            onclick="openDeleteModal('{{ $contest->slug }}', '{{ $contestant->id }}')"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="4"><p class="font-medium text-slate-200 text-center">No Contestants</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--    Daftar Submission Peserta    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-primary p-5 font-medium rounded-t-lg text-primary-content">List of Submissions</h1>
            <div class="card-body bg-accent rounded-b-lg">
{{--                <h1>{{ $contest->id }}</h1>--}}
                <button class="btn rounded font-bold" id="btnUnduh">Unduh Rekap</button>
                {{--  Table  --}}
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-secondary">
                            <th width="10%" class="text-center">ID</th>
                            <th width="22.5%" class="text-center">Tim</th>
                            <th width="22.5%" class="text-center">Link Pengumpulan</th>
                            <th width="22.5%" class="text-center">Jam Pengumpulan (Terupdate)</th>
                            <th width="22.5%" class="text-center">Score</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($submissions) != 0)
                            @foreach($submissions as $submission)
                                <tr>
                                    <td width="10%" class="text-center">{{ $submission->id }}</td>
                                    <td width="22.5%" class="text-center font-bold">{{ $submission->team->name }}</td>
                                    <td width="22.5%" class="text-center">
                                        <a href="{{ $submission->link }}" target="_blank" class="btn btn-neutral btn-xs rounded-md action">Link Tugas</a>
                                    </td>
{{--                                    <td width="22.5%" class="text-center">--}}
{{--                                        {{ $submission->updated_at }} WIB--}}
{{--                                    </td>--}}
                                    <td width="22.5%" class="text-center">
                                        {{ \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $submission->waktu_submit, 'Asia/Jakarta')->format('d F Y g:i:s A') }}
                                    </td>
                                    <td width="22.5%" class="text-center">
                                       @if($submission->score != null)
                                           <div>
                                                <div class="badge badge-lg font-bold">{{ $submission->score }}</div>
                                                <button class="mt-2 xl:ml-2 xl:mt-0 btn btn-primary btn-sm rounded" onclick="openPenilaianModal('{{ $submission->id }}')">Update</button>
                                           </div>
                                       @elseif(\Illuminate\Support\Carbon::now() <= $submission->contest->close_date)
                                           <div class="badge badge-lg badge-warning font-bold text-sm">Waiting</div>
                                       @else
                                           <button class="btn btn-primary btn-sm" onclick="openPenilaianModal('{{ $submission->id }}')">Beri Penilaian</button>
                                       @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="4"><p class="font-medium text-slate-200 text-center">No Submissions</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  Modal Hapus  --}}
    <dialog id="modalHapus" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-accent">Konfirmasi</h3>
            <form action="" method="POST" id="formDelete">
                @csrf
                <button type="submit" class="btn btn-success action rounded-lg w-full mt-8">Hapus</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-outline btn-error action rounded-lg px-8">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    {{--  Modal Penilaian  --}}
    <dialog id="modalPenilaian" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-accent">Konfirmasi</h3>
            <form action="" method="POST" id="formPenilaian">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Score:</span>
                    </div>
                    <input type="number" min="0" step="0.001" placeholder="score ..." name="score" class="input input-bordered w-full rounded" required />
                </label>
                <button type="submit" class="btn btn-success action rounded-lg w-full mt-8">Submit</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-outline btn-error action rounded-lg px-8">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
@endsection

@section('scripts')
    {{--  GSAP  --}}
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
    <script>
        // ===== Select2 Init =====
        $(document).ready(function () {
            $("#addTeam").select2();
        })

        // ===== Delete Contestant =====
        const formDelete = document.getElementById('formDelete');
        const modalDelete = document.getElementById('modalHapus');
        const modalPenilaian = document.getElementById('modalPenilaian');
        const formPenilaian = document.getElementById('formPenilaian');

        const openDeleteModal = (slug, teamId) => {
            let action = `{{ route('acara.contest') }}/${slug}/contestants/${teamId}/destroy`;
            formDelete.setAttribute('action', action);
            modalDelete.showModal();
        }

        const openPenilaianModal = (id) => {
            console.log(id);
            let action = `{{ route('acara.contest') }}/${id}/add`;
            formPenilaian.setAttribute('action', action);
            modalPenilaian.showModal();
        }

        function formatDate(dateString) {
            // Parse the date string to a Date object
            const date = new Date(dateString);

            // Define the parts of the date
            const day = date.getDate();
            const month = date.toLocaleString('default', { month: 'long' });
            const year = date.getFullYear();
            const hours = date.getHours();
            const minutes = date.getMinutes().toString().padStart(2, '0');
            const seconds = date.getSeconds().toString().padStart(2, '0');
            const period = hours >= 12 ? 'PM' : 'AM';

            // Format the hours to 12-hour format
            const formattedHours = (hours % 12 || 12).toString().padStart(2, '0');

            // Combine the parts into the desired format
            return `${day} ${month} ${year} ${formattedHours}:${minutes}:${seconds}${period}`;
        }

        $("#btnUnduh").click(function () {
            {{--console.log('{{ $contest->id }}')--}}
            let id = {{ $contest->id }};
            $.ajax({
                url: '{{ route('acara.contest.download', ['contest' => ':contest']) }}'.replace(':contest', id),
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function (data) {
                    // console.log(data);
                    // return;
                    let submissions = data.submissions;
                    let csv = [];

                    for (let i = 0; i < submissions.length; i++) {
                        let row = [];
                        // console.log(submissions[i]);
                        // console.log(Object.entries(submissions[i]))
                        // For Header
                        if (i === 0) {
                            for (const [header] of Object.entries(submissions[i])) {
                                row.push(`"${header}"`);
                            }
                            csv.push(row.join(","));
                            row = [];
                        }

                        // For Items
                        for (const [key, val] of Object.entries(submissions[i])) {
                            if (key == 'Waktu Kumpul') {
                                let val_ = formatDate(val);
                                row.push(`"${val_}"`);
                            } else {
                                row.push(`"${val}"`);
                            }
                        }
                        csv.push(row.join(","));
                    }

                    let csv_string = csv.join("\n");
                    let filename = `export_rekap_pengumpulan_tugas_${new Date().toLocaleDateString()}.csv`;
                    // console.log(csv_string);return;

                    // Create Link
                    let link = document.createElement('a');
                    link.style.display = 'none';
                    link.setAttribute('target', '_blank');
                    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
                    link.setAttribute('download', filename);
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        })
    </script>
@endsection
