@extends('pemain.layout.layout', ['title' => 'Contest'])

@section('styles')
    <style>
        .action:hover {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="grid grid-cols-1 gap-10 w-full max-w-7xl">
        {{--   Introduction    --}}
        <div class="card rounded-lg shadow-md">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg">Contest Maniac XIII 🏆</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <p class="text-slate-100 pb-3 sm:pb-0 break-words">
                    Anda dapat melihat <strong>Available Contest</strong>, <strong>Upcoming Contest</strong>, <strong>Finished Contest</strong> disini.
                </p>
                <div role="alert" class="alert rounded-md py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Mohon lakukan refresh page untuk update data contest.</span>
                </div>
            </div>
        </div>

        {{--   Introduction    --}}
        <div class="card rounded-lg shadow-md">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg text-accent">Available Contest</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-white">
                            <th width="15%">Nama</th>
                            <th width="15%">Tipe</th>
                            <th width="30%">Jadwal Mulai</th>
                            <th width="30%">jadwal Selesai</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($available_contests) != 0)
                            @foreach($available_contests as $contest)
                                <tr>
                                    <td width="15%">{{ $contest->name }}</td>
                                    <td width="15%">{{ $contest->type }}</td>
                                    <td width="30%">{{ $contest->open_date }}</td>
                                    <td width="30%">{{ $contest->close_date }}</td>
                                    @php($action = ($contest->join_date) ? 'Rejoin' : 'Join')
                                    <td width="10%"><a class="btn btn-outline btn-info btn-md px-5 py-0 w-full font-bold action">{{ $action }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
