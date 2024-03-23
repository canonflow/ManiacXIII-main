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
        }

        /* Option Select2 remove */
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            border: none;
            border-radius: 0;
            background-color: #94a3b8;
            color: oklch(var(--b3));
        }

        /* Selected Option */
        .select2-container--default .select2-results__option--selected {
            background-color: #334155;
            color: white;
        }
    </style>
@endsection

@section('content')
    @php($author = auth()->user()->acara->name)
    <div class="grid grid-cols-1 gap-10 w-full max-w-7xl">
        {{--   Introduction    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg">🏆 {{ $contest->name }} 🏆</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <h2 class="text-xl font-medium text-white mb-3">Selamat Datang, <span class="text-warning">{{ $author }}</span></h2>
                <p class="text-slate-100 pb-3 sm:pb-0 break-words">
                    Anda dapat menambahkan peserta dan melihat submission peserta pada Contest <strong class="text-accent">{{ $contest->name }}</strong>.
                </p>
                <div role="alert" class="alert rounded-md py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
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
                    <div role="alert" class="alert alert-error mb-3 rounded-md">
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
                @endif
            </div>
        </div>

        {{--    Daftar Peserta    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-slate-800 p-5 font-medium rounded-t-lg text-accent">Daftar Peserta</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
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
                        <tr class="dark:text-white light:text-slate-800">
                            <th width="10%" class="text-center">Id</th>
                            <th width="40%" class="text-center">Nama</th>
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
                                            class="btn btn-outline btn-error rounded-md px-5 py-0 font-bold action"
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
        const openDeleteModal = (slug, teamId) => {
            let action = `{{ route('acara.contest') }}/${slug}/contestants/${teamId}/destroy`;
            formDelete.setAttribute('action', action);
            modalDelete.showModal();
        }
    </script>
@endsection
