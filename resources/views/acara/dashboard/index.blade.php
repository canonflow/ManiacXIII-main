@extends('acara.layout.index', ['title' => 'Dashboard'])

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
@endsection

@section('styles')
    <style>
        .action:hover {
            color: white !important;
        }

        .air-datepicker-cell.-selected- {
            background-color:  oklch(var(--wa)) !important;
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
            <h1 class="text-xl text-primary-content bg-primary p-5 font-medium rounded-t-lg">🕹 Rally Games 🕹</h1>
            <div class="card-body bg-accent rounded-b-lg">
                <h2 class="text-xl font-medium text-white mb-3">Selamat Datang, <span class="text-warning">{{ $author }}</span></h2>
                <p class="text-slate-100 pb-3 sm:pb-0 break-words">
                    Anda dapat melihat dan menambahkan Rally Games. <br />
                    Anda dapat melihat poin peserta pada Rally Games.
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
                @error('user_id')
                <div role="alert" class="alert alert-error mb-3 rounded-md">
                    <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-slate-200 shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-slate-200"><strong>{{ $message }}</strong></span>
                    </div>
                </div>
                @enderror
                @if(session()->has('success'))
                    <div role="alert" class="alert alert-success mb-3 rounded-md">
                        <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Berhasil Menambahkan Rally Games <strong>{{ session()->get('success') }}</strong></span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{--   List of Rally Games   --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-primary p-5 font-medium rounded-t-lg text-primary-content">Available Rally Games</h1>
            <div class="card-body bg-accent rounded-b-lg">
                {{--      Pagination      --}}
                <div class="mb-6">
                    {{ $rallyGames->onEachSide(1)->withQueryString()->links('pagination::tailwind') }}
                </div>

                {{--      Rally Games      --}}
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-secondary">
                            <th width="5%" class="text-center">ID</th>
                            <th width="30%" class="text-center">Name</th>
                            <th width="30%" class="text-center">Type</th>
                            <th width="30%" class="text-center">Penpos</th>
                            <th width="5%" class="text-center">
                                <button
                                    class="btn btn-outline btn-success btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                    onclick="event.preventDefault(); modalTambah.showModal()"
                                >
                                    Tambah
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($rallyGames) != 0)
                            @foreach($rallyGames as $rally)
                                <tr>
                                    <td width="5%" class="text-center">{{ $rally->id }}</td>
                                    <td width="30%" class="text-center">{{ $rally->name }}</td>
                                    <td width="30%" class="text-center">{{ $rally->type }}</td>
                                    <td width="30%" class="text-center">{{ $rally->user->username }}</td>
                                    <td width="5%" class="text-center">
                                        <a
                                            class="btn btn-success btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                            href="{{ route('acara.rallygames.rally', ['rallyGame' => $rally->id]) }}"
                                        >
                                            Point
                                        </a>
                                        <a
                                            class="btn btn-info btn-sm rounded-md px-5 py-0 w-full font-bold mt-4 lg:mt-3"
                                            onclick=""
                                        >
                                            Edit
                                        </a>
                                        <button
                                            class="btn text-primary-content btn-error btn-sm rounded-md px-5 py-0 w-full font-bold action mt-4 lg:mt-3"
                                            onclick=""
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Rally Games</p></td></tr>
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
            <h3 class="font-bold text-2xl text-accent">Tambah Rally Games</h3>
            <form class="flex flex-col items-center justify-center mt-5 gap-y-6" method="POST" action="{{ route('acara.rallygames.store') }}">
                @csrf
                <input type="text" placeholder="Nama Rally Games" name="name" class="input input-bordered input-accent w-full" />
                <label for="" class="form-control w-full">
                    <span class="label">
                        <span class="label-text">Tipe</span>
                    </span>
                    <select class="select select-accent w-full" name="type">
                        <option disabled selected>Pilih Tipe Rally Games</option>
                        <option value="single">Single</option>
                        <option value="battle">Battle</option>
                        <option value="dungeon">Dungeon</option>
                    </select>
                </label>
                <label for="" class="form-control w-full">
                    <span class="label">
                        <span class="label-text">Penpos</span>
                    </span>
                    <select class="select select-accent w-full" name="user_id">
                        <option disabled selected>Pilih Penpos</option>
                        @foreach($penpos as $p)
                            <option value="{{ $p->id }}">{{ $p->username }}</option>
                        @endforeach
                    </select>
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
@endsection
