@extends('supersi.layout.index', ['pageActive' => 'super-si.player', 'pageTitle' => 'Player Log'])

@section('content')
    {{--  Breadcrumbs  --}}
    <div class="breadcrumbs text-sm">
        <ul>
            <li>
                <a href="{{ route('super-si.player.index') }}" class="font-medium">
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
                    Player
                </a>
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
                Log
              </span>
            </li>
        </ul>
    </div>

    {{--  Content  --}}
    <div class="flex flex-col justify-center content-center w-full bg-slate-400 p-3 rounded-md mt-4">
        <button
            class="bg-red-700 text-slate-50 font-semibold py-2 px-3 mb-3 w-28 rounded-md hover:bg-red-600 active:scale-95 transition-all"
            onclick="window.location = '{{ route('super-si.player.index') }}'"
        >
            Back
        </button>
        {{--  Table  --}}
        <div class="overflow-auto rounded" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead class="">
                <tr class="text-slate-900 font-medium" style="font-size: 1.1rem;">
                    <th width="50%" class="text-center py-3">Description</th>
                    <th width="50%" class="text-center py-3">Created At</th>
                </tr>
                </thead>
                <tbody id="tBody">
{{--                    @php($logs = $player->logs()->orderBy('created_at', 'DESC')->get())--}}
                    @if(count($logs) > 0)
                        @foreach($logs as $log)
                            <tr class="">
                                <td class="py-5 text-slate-800 text-lg break-words max-w-xl">{!! $log->desc !!}</td>
                                <td class="text-center py-5 text-slate-800 text-lg" width="50%">{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td width="100%" class="font-medium text-lg text-slate-900 text-center" colspan="2">There are no logs!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{--      Pagination      --}}
        <div class="mt-6">
            {{ $logs->onEachSide(1)->withQueryString()->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection

@section('scripts')

@endsection
