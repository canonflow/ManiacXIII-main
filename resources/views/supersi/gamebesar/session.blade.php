@extends('supersi.layout.index', ['pageActive' => 'super-si.gamebesar', 'pageTitle' => 'Game Besar Session'])

@section('styles')
    <style>
        [type='radio'], [type='radio']:checked {
            background: none;
            /*border: none;*/
            --tw-ring-offset-color: none;
            --tw-ring-color: none;
            --tw-ring-offset-shadow: none;
            --tw-ring-shadow: none;
            --tw-shadow: none;
            --tw-shadow-colored: none;
        }

        .tabs-lifted > .tab.tab-active:not(.tab-disabled):not([disabled]), .tabs-lifted > .tab:is(input:checked) {
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
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current mr-1">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                        </path>
                    </svg>
                    Game Besar
                </a>
            </li>
            <li>
              <span class="inline-flex items-center gap-2 font-medium">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current mr-1">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                        </path>
                    </svg>
                  Session
              </span>
            </li>
            <li>
              <span class="inline-flex items-center gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                  ID : {{ $session->id }}
              </span>
            </li>
        </ul>
    </div>

    {{--  Alert  --}}
    <div>
        @if(session()->has('updateSuccess'))
            <div role="alert" class="alert rounded-md bg-green-300 border-none mt-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('updateSuccess') }}</span>
            </div>
        @elseif(session()->has('error'))
            <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif
        @error('multiplier')
        <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
        @error('max_team')
        <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
        @error('open')
        <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
        @error('close')
        <div role="alert" class="alert rounded-md bg-red-300 border-none mt-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><strong>{{ $message }}</strong></span>
        </div>
        @enderror
    </div>

    {{--  Content  --}}
    <div class="flex flex-col justify-center content-center w-full bg-slate-400 p-3 rounded-md mt-4">
        <h3 class="font-black text-2xl text-slate-800">Edit Session</h3>
        <form class="mt-5 gap-y-6" method="POST" action="{{ route('super-si.gamebesar.session.update', ['session' => $session->id]) }}" id="formEdit">
            @csrf
            <div class="grid grid-cols-2 gap-x-10 mb-4">
                <div class="grid grid-cols-1">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Multiplier</span>
                        </div>
                        <input
                            type="number"
{{--                            placeholder="Multiplier"--}}
                            name="multiplier"
                            class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                            id="editName"
                            value="{{ $session->multiplier }}"
                        />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Max Team</span>
                        </div>
                        <input
                            type="number"
{{--                            placeholder="Max Team"--}}
                            name="max_team"
                            class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                            id="editName"
                            value="{{ $session->max_team }}"
                        />
                    </label>
                </div>
                <div>
                    <label for="" class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Buka</span>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-y-5">
                            <input
                                type="text"
{{--                                placeholder="Tanggal Buka" --}}
                                id="editOpenDate"
                                name="open"
                                class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                                value="{{ $session->open }}"
                                readonly
                            >
                        </div>
                    </label>
                    <label for="" class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Tutup</span>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-y-5">
                            <input
                                type="text"
{{--                                placeholder="Tanggal Tutup" --}}
                                id="editCloseDate"
                                name="close"
                                class="input input-bordered bg-slate-500 w-full text-slate-800 font-semibold border-slate-600"
                                value="{{ $session->close }}"
                                readonly
                            >
                        </div>
                    </label>
                </div>
            </div>
            <button class="w-full bg-green-800 text-slate-50 font-semibold py-2 px-3 rounded hover:bg-green-700 active:scale-95 transition-all">Update</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="module">
        const calendar = minMaxDatePicker("#editOpenDate", '#editCloseDate', false);
        const dateOpen = new Date('{{ $session->open }}');
        const dateClose = new Date('{{ $session->close }}');
        calendar.dpMin.selectDate(dateOpen, { updateTime: true });
        calendar.dpMax.selectDate(dateClose, { updateTime: true });
    </script>
@endsection
