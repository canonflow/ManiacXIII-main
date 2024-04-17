@extends('acara.layout.index', ['title' => 'Contest'])

@section('cdn')
    {{--  GSAP  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--  Notyf  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    {{--  Select2  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{--  Air Datepicker  --}}
    @vite('resources/js/datepicker.js')
@endsection

@section('styles')
    <style>
        .action:hover {
            color: white !important;
        }

        .air-datepicker-cell.-selected- {
            background-color:  oklch(var(--wa)) !important;
            color: oklch(var(--b3));
        }

        .air-datepicker-cell.-current- {
            font-weight: bold;
        }

        #air-datepicker-global-container {
            z-index: 10000 !important;
        }
    </style>
@endsection

@section('content')
    @php($author = auth()->user()->acara->name)
    <div class="grid grid-cols-1 gap-10 w-full max-w-7xl">
        {{--   Introduction    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-slate-200 bg-primary p-5 font-medium rounded-t-lg">Contest Maniac XIII 🏆</h1>
            <div class="card-body bg-accent rounded-b-lg">
                <h2 class="text-xl font-medium text-white mb-3">Selamat Datang, <span class="text-warning">{{ $author }}</span></h2>
                <p class="text-slate-100 pb-3 sm:pb-0 break-words">
                    Anda dapat melihat <strong>Available Contest</strong>, <strong>Upcoming Contest</strong>, and <strong>Finished Contest</strong> di sini.
                </p>
                <p class="font-medium alert alert-info py-2 rounded-md text-white">
                    Anda hanya dapat mengubah contest yang Anda buat sendiri. <br />Tidak dapat mengubah atau menghapus contest yang dibuat oleh orang lain.
                </p>
                <div role="alert" class="alert rounded-md py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Mohon lakukan refresh page untuk update data contest.</span>
                </div>
                @if(session()->has('addSuccess'))
                    <div role="alert" class="alert alert-success mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Berhasil Menambahkan Contest <strong>{{ session()->get('addSuccess') }}</strong></span>
                        </div>
                    </div>
                @elseif(session()->has('editSuccess'))
                    <div role="alert" class="alert alert-success mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Berhasil Mengubah Contest <strong>{{ session()->get('editSuccess') }}</strong></span>
                        </div>
                    </div>
                @elseif(session()->has('deleteSuccess'))
                    <div role="alert" class="alert alert-error mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Berhasil Menghapus Contest <strong>{{ session()->get('deleteSuccess') }}</strong></span>
                        </div>
                    </div>
                @elseif(session()->has('unauthorized'))
                    <div role="alert" class="alert alert-error mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><strong>{{ session()->get('unauthorized') }}</strong></span>
                        </div>
                    </div>
                @endif
                @error('name')
                <div role="alert" class="alert alert-error mb-3 rounded-md">
                    <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-slate-200 shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-slate-200"><strong>{{ $message }}</strong></span>
                    </div>
                </div>
                @enderror
                @error('type')
                <div role="alert" class="alert alert-error mb-3 rounded-md">
                    <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-slate-200 shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-slate-200"><strong>{{ $message }}</strong></span>
                    </div>
                </div>
                @enderror
                @error('open_date')
                <div role="alert" class="alert alert-error mb-3 rounded-md">
                    <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-slate-200 shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-slate-200"><strong>{{ $message }}</strong></span>
                    </div>
                </div>
                @enderror
                @error('close_date')
                <div role="alert" class="alert alert-error mb-3 rounded-md">
                    <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-slate-200 shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-slate-200"><strong>{{ $message }}</strong></span>
                    </div>
                </div>
                @enderror
            </div>
        </div>

        {{--   Available Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-primary p-5 font-medium rounded-t-lg text-primary-content">Available Contest</h1>
            <div class="card-body bg-accent rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-secondary">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="25%" class="text-center">Jadwal Mulai</th>
                            <th width="25%" class="text-center">jadwal Selesai</th>
                            <th width="10%" class="text-center">Author</th>
                            <th width="10%" class="text-center">
                                <button
                                    class="btn btn-outline btn-success btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                    onclick="tambahContest()"
                                >
                                    Tambah
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($available_contests) != 0)
                            @foreach($available_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="25%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="25%" class="text-center">{{ $contest->close_date }}</td>
                                    <td width="10%" class="text-center font-medium">{{ $contest->author->name }}</td>
                                    <td width="10%" class="text-center">
                                        <a
                                            class="btn btn-success btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                            href="{{ route('acara.contest.show', $contest->slug) }}"
                                        >
                                            Contest
                                        </a>
                                        @if($contest->author->name == $author)
                                        <a
                                            class="btn btn-info btn-sm rounded-md px-5 py-0 w-full font-bold mt-4 lg:mt-3"
                                            onclick="openEditModal('{{ $contest->slug }}')"
                                        >
                                            Edit
                                        </a>
                                        <button
                                            class="btn text-primary-content btn-error btn-sm rounded-md px-5 py-0 w-full font-bold action mt-4 lg:mt-3"
                                            onclick="openDeleteModal('{{ $contest->slug }}')"
                                        >
                                            Delete
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6"><p class="font-medium text-slate-200 text-center">No Active Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--   Upcoming Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-primary-content bg-primary p-5 font-medium rounded-t-lg">Upcoming Contest</h1>
            <div class="card-body bg-accent rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-secondary">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="25%" class="text-center">Jadwal Mulai</th>
                            <th width="25%" class="text-center">jadwal Selesai</th>
                            <th width="10%" class="text-center">Author</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($upcoming_contests) != 0)
                            @foreach($upcoming_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="25%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="25%" class="text-center">{{ $contest->close_date }}</td>
                                    <td width="10%" class="text-center">{{ $contest->author->name }}</td>
                                    <td width="10%" class="text-center">
                                        <a
                                            class="btn btn-success btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                            href="{{ route('acara.contest.show', $contest->slug) }}"
                                        >
                                            Contest
                                        </a>
                                        @if($contest->author->name == $author)
                                            <a
                                                class="btn btn-info btn-sm rounded-md px-5 py-0 w-full font-bold mt-4 lg:mt-3"
                                                onclick="openEditModal('{{ $contest->slug }}')"
                                            >
                                                Edit
                                            </a>
                                            <button
                                                class="btn text-primary-content btn-error btn-sm rounded-md px-5 py-0 w-full font-bold action mt-4 lg:mt-3"
                                                onclick="openDeleteModal('{{ $contest->slug }}')"
                                            >
                                                Delete
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6"><p class="font-medium text-slate-200 text-center">No Upcoming Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--   Finished Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-primary-content bg-primary p-5 font-medium rounded-t-lg">Finished Contest</h1>
            <div class="card-body bg-accent rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-secondary">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="25%" class="text-center">Jadwal Mulai</th>
                            <th width="25%" class="text-center">jadwal Selesai</th>
                            <th width="10%" class="text-center">Author</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($finished_contests) != 0)
                            @foreach($finished_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="25%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="25%" class="text-center">{{ $contest->close_date }}</td>
                                    <td width="10%" class="text-center font-medium">{{ $contest->author->name }}</td>
                                    <td width="10">
                                        <a
                                            class="btn btn-success btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                            href="{{ route('acara.contest.show', $contest->slug) }}"
                                        >
                                            Contest
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6"><p class="font-medium text-slate-200 text-center">No Finished Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  Modal Tambah  --}}
    <dialog id="modalTambah" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-accent">Tambah Contest</h3>
            <form class="flex flex-col items-center justify-center mt-5 gap-y-6" method="POST" action="{{ route('acara.contest.store') }}">
                @csrf
                <input type="text" placeholder="Nama Contest" name="name" class="input input-bordered input-accent w-full" />
                <select class="select select-accent w-full" name="type">
                    <option disabled selected>Pilih tipe contest</option>
                    <option value="workshop">Workshop</option>
{{--                    <option value="final">Final</option>--}}
                </select>
                <label for="" class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tanggal Buka</span>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-y-5">
                        <input type="text" placeholder="Tanggal Buka" id="tambahOpenDate" name="open_date" class="input input-bordered input-accent w-full" readonly>
                    </div>
                </label>
                <label for="" class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tanggal Tutup</span>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-y-5">
                        <input type="text" placeholder="Tanggal Tutup" id="tambahCloseDate" name="close_date" class="input input-bordered input-accent w-full" readonly>
                    </div>
                </label>
                <button class="btn btn-success w-full action font-medium">Tambah</button>
            </form>
            <div class="modal-action">
                <form method="dialog" id="closeDialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-outline btn-error action rounded-lg px-8">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    {{--  Modal Edit  --}}
    <dialog id="modalEdit" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-accent">Edit Contest</h3>
            <form class="flex flex-col items-center justify-center mt-5 gap-y-6" method="POST" action="{{ route('acara.contest.store') }}" id="formEdit">
                @csrf
                <input type="text" placeholder="Nama Contest" name="name" class="input input-bordered input-accent w-full" id="editName"/>
                <select class="select select-accent w-full" name="type">
                    <option disabled selected>Pilih tipe contest</option>
                    <option value="workshop">Workshop</option>
                    {{--                    <option value="final">Final</option>--}}
                </select>
                <label for="" class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tanggal Buka</span>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-y-5">
                        <input type="text" placeholder="Tanggal Buka" id="editOpenDate" name="open_date" class="input input-bordered input-accent w-full" value="{{ $contest->open_date }}" readonly>
                    </div>
                </label>
                <label for="" class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tanggal Tutup</span>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-y-5">
                        <input type="text" placeholder="Tanggal Tutup" id="editCloseDate" name="close_date" class="input input-bordered input-accent w-full" readonly>
                    </div>
                </label>
                <button class="btn btn-success w-full action font-medium">Ubah</button>
            </form>
            <div class="modal-action">
                <form method="dialog" id="closeDialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-outline btn-error action rounded-lg px-8">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

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
        $('body').on('focus',".air-datepicker-global-container", function(){
            $(this).datepicker();
        });
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
    {{--  Date Picker  --}}
    <script type="module">
        // Gk tau kenapa gk isa pakai object destruction
        const calendar = minMaxDatePicker("#tambahOpenDate", '#tambahCloseDate', true);
        const calendar2 = minMaxDatePicker("#editOpenDate", '#editCloseDate', true);
        const modalTambah = document.getElementById('modalTambah');
        const modalDelete = document.getElementById('modalHapus');
        const modalEdit = document.getElementById('modalEdit');
        const formEdit = document.getElementById('formEdit');
        const formDelete = document.getElementById('formDelete');
        const editOpenDate = document.getElementById('editOpenDate');
        const editCloseDate = document.getElementById('editCloseDate');


        const tambahContest = (slug) => {
            modalTambah.showModal();
            calendar.dpMin.clear(true);
            calendar.dpMax.clear(true);
        }

        const editContest = (slug) => {
            let action = `{{ route('acara.index') }}/${slug}/edit`;
            console.log(action);
        }

        const openEditModal = (slug) => {
            let action = `{{ route('acara.index') }}/${slug}/edit`;
            formEdit.setAttribute('action', action);

            $.get(`{{ route('acara.contest') }}/${slug}/edit`, function (data, status) {
                formEdit.setAttribute('action', `{{ route('acara.contest') }}/${slug}/edit`);
                calendar2.dpMin.clear(true);
                calendar2.dpMax.clear(true);

                // Set Calendar value
                const dateOpen = new Date(data.contest.open_date);
                const dateClose = new Date(data.contest.close_date);
                calendar2.dpMin.selectDate(dateOpen, { updateTime: true });
                calendar2.dpMax.selectDate(dateClose, { updateTime: true });

                modalEdit.showModal();
            })
        }

        const openDeleteModal = (slug) => {
            let action = `{{ route('acara.contest') }}/${slug}/destroy`;
            formDelete.setAttribute('action', action);
            modalDelete.showModal();
        }

        window.tambahContest = tambahContest;
        window.editContest = editContest;
        window.openDeleteModal = openDeleteModal;
        window.openEditModal = openEditModal;
    </script>
    <script>

    </script>
@endsection
