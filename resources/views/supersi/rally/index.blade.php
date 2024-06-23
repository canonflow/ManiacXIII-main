@extends('supersi.layout.index', ['pageActive' => 'super-si.rally', 'pageTitle' => 'Rally Games'])

@section('content')
    {{--  Breadcrumbs  --}}
    <div class="breadcrumbs text-sm">
        <ul>
            <li>
                <a href="{{ route('super-si.index') }}" class="font-medium">
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
                    Rally Games
                </a>
            </li>
        </ul>
    </div>

    {{--  Content  --}}
    <div class="flex flex-col justify-center content-center w-full bg-slate-400 p-3 rounded-md mt-4">
        <div class="overflow-auto rounded" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead>
                    <tr class="text-slate-900 font-medium" style="font-size: 1.1rem;">
                        <th width="5%" class="text-center py-3">ID</th>
                        <th width="20%" class="text-center">Rally Games</th>
                        <th width="20%" class="text-center">Penpos</th>
                        <th width="20%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tBody">
                    @foreach($rallyGames as $rg)
                        <tr class="text-slate-900 font-medium" style="font-size: 0.9rem;">
                            <td width="5%" class="text-center py-5">{{ $rg->id }}</td>
                            <td width="20%" class="text-center">{{ $rg->name }}</td>
                            <td width="20%" class="text-center">{{ $rg->user->username }}</td>
                            <td width="20%" class="text-center">
                                <button
                                    class="bg-slate-900 text-slate-50 font-semibold py-2 px-3 rounded hover:bg-slate-700 active:scale-95 transition-all"
                                    onclick="window.location = '{{ route('super-si.index') }}/{{ $rg->id }}'"
                                >
                                    Show
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--      Pagination      --}}
        <div class="mt-6">
            {{ $rallyGames->onEachSide(1)->withQueryString()->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
