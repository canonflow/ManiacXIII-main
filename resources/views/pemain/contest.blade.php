@extends('pemain.layout.layout', ['title' => 'Contest'])

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

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
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg">Contest Maniac XIII 🏆</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <p class="text-slate-100 pb-3 sm:pb-0 break-words">
                    Anda dapat melihat <strong>Available Contest</strong>, <strong>Upcoming Contest</strong>, and <strong>Finished Contest</strong> di sini.
                </p>
                <div role="alert" class="alert rounded-md py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Mohon lakukan refresh page untuk update data contest.</span>
                </div>
            </div>
        </div>

        {{--   Available Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg text-accent">Available Contest</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-white">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="30%" class="text-center">Jadwal Mulai</th>
                            <th width="30%" class="text-center">jadwal Selesai</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($available_contests) != 0)
                            @foreach($available_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="30%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="30%" class="text-center">{{ $contest->close_date }}</td>
                                    @php($action = ($contest->join_date) ? 'Rejoin' : 'Join')
                                    <td width="10%" class="text-center">
                                        <a
                                            class="btn btn-outline btn-info btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                            href="{{ route('team.contest.submition', $contest) }}"
                                            >
                                            {{ $action }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Active Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--   Upcoming Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg">Upcoming Contest</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-white">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="30%" class="text-center">Jadwal Mulai</th>
                            <th width="30%" class="text-center">jadwal Selesai</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($upcoming_contests) != 0)
                            @foreach($upcoming_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="30%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="30%" class="text-center">{{ $contest->close_date }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Upcoming Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--   Finished Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg">Finished Contest</h1>
            <div class="card-body bg-slate-600 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="text-white">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="30%" class="text-center">Jadwal Mulai</th>
                            <th width="30%" class="text-center">jadwal Selesai</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @if(count($finished_contests) != 0)
                            @foreach($finished_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="30%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="30%" class="text-center">{{ $contest->close_date }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Finished Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
