@extends('supersi.layout.index', ['pageActive' => 'super-si.gamebesar', 'pageTitle' => 'Game Besar'])

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
        </ul>
    </div>

    {{--  Content  --}}
    <div class="flex flex-col justify-center content-center w-full bg-slate-400 p-3 rounded-md mt-4">
        <div role="tablist" class="tabs tabs-lifted">
            <input type="radio" name="my_tabs_2" role="tab" class="tab bg-slate-500 font-medium text-slate-50" aria-label="Tab 1" checked="checked"/>
            <div role="tabpanel" class="tab-content bg-slate-600 rounded p-6">
                Tab content 1
            </div>

            <input
                type="radio"
                name="my_tabs_2"
                role="tab"
                class="tab tab bg-slate-500 font-medium text-slate-50"
                aria-label="Tab 2"
            />
            <div role="tabpanel" class="tab-content bg-slate-600 rounded p-6">
                Tab content 2
            </div>

            <input type="radio" name="my_tabs_2" role="tab" class="tab tab bg-slate-500 font-medium text-slate-50" aria-label="Tab 3" />
            <div role="tabpanel" class="tab-content bg-slate-600 rounded p-6">
                Tab content 3
            </div>
        </div>
    </div>
@endsection
