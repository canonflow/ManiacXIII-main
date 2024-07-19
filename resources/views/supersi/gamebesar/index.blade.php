@extends('supersi.layout.index', ['pageActive' => 'super-si.gamebesar', 'pageTitle' => 'Game Besar'])

@php
    if (!session()->has('tab')) {
        $currTab = 'session';
    } else {
        $currTab = session()->get('tab');
    }
@endphp

@section('styles')
    <style>
        [type='radio'],
        [type='radio']:checked {
            background: none;
            /*border: none;*/
            --tw-ring-offset-color: none;
            --tw-ring-color: none;
            --tw-ring-offset-shadow: none;
            --tw-ring-shadow: none;
            --tw-shadow: none;
            --tw-shadow-colored: none;
        }

        .tabs-lifted>.tab.tab-active:not(.tab-disabled):not([disabled]),
        .tabs-lifted>.tab:is(input:checked) {
            background-color: #475569;
        }

        .tab {
            --tab-border-color: transparent;
            --tab-bg: #475569;
        }
    </style>
@endsection

@section('content')
    {{--  Breadcrumbs  --}}
    <div class="breadcrumbs text-sm">
        <ul>
            <li>
                <a href="{{ route('super-si.gamebesar.index') }}" class="font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                        </path>
                    </svg>
                    Game Besar
                </a>
            </li>
        </ul>
    </div>

    {{--  Alert  --}}
    <div>
        @if (session()->has('addSuccess'))
            <div role="alert" class="alert rounded-md bg-green-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('addSuccess') }}</span>
            </div>
        @elseif(session()->has('updateSuccess'))
            <div role="alert" class="alert rounded-md bg-green-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('updateSuccess') }}</span>
            </div>
        @elseif(session()->has('error'))
            <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif
        @error('multiplier')
            <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><strong>{{ $message }}</strong></span>
            </div>
        @enderror
        @error('max_team')
            <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><strong>{{ $message }}</strong></span>
            </div>
        @enderror
        @error('open')
            <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><strong>{{ $message }}</strong></span>
            </div>
        @enderror
        @error('close')
            <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><strong>{{ $message }}</strong></span>
            </div>
        @enderror
    </div>

    {{--  Content  --}}
    <div class="flex flex-col justify-center content-center w-full bg-slate-400 p-3 rounded-md mt-4">
        <div role="tablist" class="tabs tabs-lifted">
            {{--  Session  --}}
            <input type="radio" name="my_tabs_2" role="tab" class="tab bg-slate-500 font-medium text-slate-50"
                aria-label="Session" {{ $currTab == 'session' ? 'checked' : '' }} />
            <div role="tabpanel" class="tab-content bg-slate-500 rounded p-6 overflow-auto">
                {{--  Table  --}}
                <div class="overflow-auto rounded" style="max-height: 450px">
                    <table class="table table-xs table-pin-cols table-pin-rows">
                        <thead class="">
                            <tr class="text-slate-900 font-medium" style="font-size: 1.1rem;">
                                <th width="20%" class="text-center py-3">Sesi</th>
                                <th width="20%" class="text-center py-3">Open</th>
                                <th width="20%" class="text-center py-3">Close</th>
                                <th width="20%" class="text-center py-3">Status</th>
                                <th width="20%" class="text-center py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            @foreach ($sessions as $idx => $session)
                                <tr class="text-slate-900 font-medium" style="font-size: 0.9rem;">
                                    <td width="20%" class="text-center py-5 text-white">{{ $idx + 1 }}</td>
                                    <td width="20%" class="text-center py-5 text-white">{{ $session->open }}</td>
                                    <td width="20%" class="text-center py-5 text-white">{{ $session->close }}</td>
                                    <td width="20%" class="text-center py-5 text-white">
                                        @php
                                            $status = 'inactive';
                                            $badge = 'bg-slate-600';

                                            if (
                                                $session->open <= \Illuminate\Support\Carbon::now() &&
                                                $session->close >= \Illuminate\Support\Carbon::now()
                                            ) {
                                                $status = 'active';
                                                $badge = 'bg-green-900';
                                            }
                                        @endphp
                                        <div class="badge border-none text-slate-50 font-medium {{ $badge }}">
                                            {{ $status }}
                                        </div>
                                    </td>
                                    <td width="20%" class="text-center">
                                        <button
                                            class="bg-slate-900 text-slate-50 font-semibold py-2 px-5 rounded hover:bg-slate-700 active:scale-95 transition-all"
                                            onclick="window.location = '{{ route('super-si.gamebesar.index') }}/session/{{ $session->id }}'">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{--  Add Session  --}}
                <button
                    class="w-full bg-sky-700 text-slate-50 font-semibold py-2 px-3 rounded hover:bg-sky-600 active:scale-95 transition-all"
                    onclick="openAddModal()">
                    Add
                </button>
            </div>

            <input type="radio" name="my_tabs_2" role="tab" class="tab bg-slate-500 font-medium text-slate-50"
                aria-label="Alpha" {{ $currTab == 'alpha' ? 'checked' : '' }} />
            <div role="tabpanel" class="tab-content bg-slate-500 rounded p-6">
                <p class="text-xl">Current Health: <span
                        class="font-bold">{{ $alpha ? number_format($alpha->health) : 0 }}</span></p>
                <form action="{{ route('super-si.gamebesar.alpha.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="alpha_id" value="1">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-slate-50">Health</span>
                        </div>
                        <input type="number" {{--                            placeholder="Multiplier" --}} name="health"
                            class="input bg-slate-600 w-full text-slate-800 font-semibold border-slate-600" id="editName"
                            required />
                    </label>
                    <button
                        class="w-full bg-green-600 text-slate-50 font-semibold mt-4 py-2.5 px-4 rounded-lg select-none hover:bg-green-500 active:scale-95 transition-all">
                        Update
                    </button>
                </form>
            </div>

            <input type="radio" name="my_tabs_2" role="tab" class="tab bg-slate-500 font-medium text-slate-50"
                aria-label="Debuff" {{ $currTab == 'debuff' ? 'checked' : '' }} />
            <div role="tabpanel" class="tab-content bg-slate-500 rounded p-6 overflow-auto">
                <div class="overflow-auto rounded" style="max-height: 450px">
                    <table class="table table-xs table-pin-cols table-pin-rows">
                        <thead>
                            <tr class="text-slate-900 font-medium" style="font-size: 1.1rem;">
                                <th width="20%" class="text-center text-sm xl:text-lg py-3 bg-slate-100">Debuff ID</th>
                                <th width="40%" class="text-center text-sm xl:text-lg bg-slate-100">Affected Count</th>
                                <th width="40%" class="text-center text-sm xl:text-lg bg-slate-100">Detail</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            @php($rank = 1)
                            @foreach ($listDebuff as $id => $debuff)
                                <tr class="text-slate-900 font-medium select-none">
                                    <td width="20%" class="text-center py-5 font-bold text-white text-lg">
                                        {{ $id }}
                                    </td>
                                    <td width="20%" class="text-center">
                                        <span
                                            class="rounded-full bg-slate-900 px-5 py-2 text-white font-semibold border border-1 border-white">
                                            {{ $debuff->count() }}
                                        </span>
                                    </td>
                                    <td width="20%" class="text-center">
                                        <button
                                            class="bg-green-200 text-green-800 font-semibold py-2 px-5 rounded hover:bg-green-100 active:scale-95 transition-all xl:col-start-3 xl:col-end-4"
                                            id="btnSummarize" onclick="modalDebuff_{{ $id }}.showModal()">
                                            Show
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal Each Debuff --}}
                                <dialog id="modalDebuff_{{ $id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box text-slate-900">
                                        <h3 class="text-xl font-bold">Debuff {{ $id }}</h3>
                                        <div class="overflow-auto rounded mt-2" style="max-height: 450px">
                                            <div class="grid grid-cols-2">
                                                @php($row = 0)
                                                @php($i = 0)
                                                @foreach ($debuff as $player)
                                                    @php($bg = $row % 2 == 0 ? 'bg-slate-300' : 'bg-slate-200')
                                                    <div class="{{ $bg }} p-1 text-center font-medium">
                                                        {{ $player->team->name }}</div>
                                                    @php($i++)
                                                    <?php
                                                    if ($i == 2) {
                                                        $row++;
                                                        $i = 0;
                                                    }
                                                    ?>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-action">
                                            <form method="dialog">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button class="btn">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </dialog>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  Add Modal --}}
    <dialog id="addModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box bg-slate-800">
            <h3 class="text-lg font-bold">Delete Score</h3>
            <form action="{{ route('super-si.gamebesar.session.add') }}" method="POST" id="formAdd">
                @csrf
                <div class="grid grid-cols-1 gap-x-10 mb-4">
                    <div class="grid grid-cols-1">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-slate-50">Multiplier</span>
                            </div>
                            <input type="number" {{--                            placeholder="Multiplier" --}} name="multiplier"
                                class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                                id="editName" required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-slate-50">Max Team</span>
                            </div>
                            <input type="number" {{--                            placeholder="Max Team" --}} name="max_team"
                                class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                                id="editName" required />
                        </label>
                    </div>
                    <div>
                        <label for="" class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-slate-50">Tanggal Buka</span>
                            </div>
                            <div class="flex flex-col justify-center items-center gap-y-5">
                                <input type="text" {{--                                placeholder="Tanggal Buka" --}} id="addOpenDate" name="open"
                                    class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                                    readonly required>
                            </div>
                        </label>
                        <label for="" class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-slate-50">Tanggal Tutup</span>
                            </div>
                            <div class="flex flex-col justify-center items-center gap-y-5">
                                <input type="text" {{--                                placeholder="Tanggal Tutup" --}} id="addCloseDate" name="close"
                                    class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                                    readonly required>
                            </div>
                        </label>
                    </div>
                </div>
                <button
                    class="w-full bg-green-600 text-slate-50 font-semibold mt-4 py-2.5 px-4 rounded-lg select-none hover:bg-green-500 active:scale-95 transition-all">
                    Add
                </button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button
                        class="bg-slate-600 text-slate-50 font-semibold py-2.5 px-4 rounded-lg select-none hover:bg-slate-500 active:scale-95 transition-all">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
@endsection

@section('scripts')
    <script type="module">
        const calendar = minMaxDatePicker("#addOpenDate", '#addCloseDate', true);
    </script>
    <script>
        const addModal = $("#addModal");
        const formAdd = $("#formAdd");

        const openAddModal = () => {
            addModal[0].showModal();
        }
    </script>
@endsection
