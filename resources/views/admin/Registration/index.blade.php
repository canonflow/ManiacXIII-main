@extends('admin.layout.index', ['pageActive' => 'admin.registration', 'pageTitle' => 'Registration'])

@section('content')
    <div class="text-sm breadcrumbs gap-1 flex items-center">
        <h1 class="text-xl font-semibold">Admin</h1>
        <div class="divider divider-horizontal mx-0"></div>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.teams.index') }}" class="text-secondary font-medium">Registration</a></li>
        </ul>
    </div>

    <div class="flex flex-col justify-center content-center w-full bg-gray-800 p-3 rounded-lg">
        {{--    Alert    --}}
        @if(session()->has('deactivateSuccess'))
        <div role="alert" class="alert alert-success mb-3 rounded-md">
            <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Berhasil deactivate <strong>{{ session()->get('deactivateSuccess') }}</strong></span>
            </div>
        </div>
        @endif

        {{--    Header    --}}
        <div class="flex flex-col gap-y-4">
            <h2 class="text-lg">Search & Filter</h2>
            {{--      Search      --}}
            <form class="grid grid-cols-1 md:grid-cols-2 items-start w-full justify-between" method="GET" action="{{ route('admin.teams.search') }}">
                {{--  Status  --}}
                <div class="flex flex-col">
                    <p class="text-sm mb-1.5">Status</p>
                    <div class="flex flex-row gap-x-3">
                        <label class="label cursor-pointer gap-x-1">
                            <input type="checkbox" class="checkbox checkbox-sm" name="status[]" {{ in_array('waiting', request('status')) ? ' checked' : '' }} value="waiting">
                            <span class="label-text">Waiting</span>
                        </label>
                        <label class="label cursor-pointer gap-x-1">
                            <input type="checkbox" class="checkbox checkbox-sm checkbox-warning" name="status[]" {{ in_array('unverified', request('status')) ? ' checked' : '' }} value="unverified">
                            <span class="label-text">Unverified</span>
                        </label>
                        <label class="label cursor-pointer gap-x-1">
                            <input type="checkbox" class="checkbox checkbox-sm checkbox-success" name="status[]" {{ in_array('verified', request('status')) ? ' checked' : '' }} value="verified">
                            <span class="label-text">Verified</span>
                        </label>
                    </div>
                </div>

                {{--    Input    --}}
                <div class="place-self-end mt-5 lg:mt-0">
                    <div class="text-sm mb-1.5">Search by</div>
                    <div class="flex flex-wrap">
                        <select class="select select-bordered rounded-none rounded-l-md" name="search">
                            <option value="teams.name" selected>Team</option>
                            <option value="participants.name">Peserta</option>
                            <option value="teams.school_name">Sekolah</option>
                        </select>
                        <div>
                            <div>
                                <input class="input input-bordered rounded-none" placeholder="Search" name="name" value="{{ session('name') ?? '' }}" />
                            </div>
                        </div>
                        <div class="indicator">
                            <button class="btn join-item sm:btn-md rounded-l-none" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="divider my-8">
            Teams
        </div>

        {{--    Teams    --}}
        <div class="overflow-auto" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead>
                <tr>
                    <th width="5%" class="text-center">ID</th>
                    <th width="20%" class="text-center">Nama</th>
                    <th width="10%" class="text-center">Status</th>
                    <th width="30%" class="text-center">Peserta</th>
                    <th width="30%" class="text-center">Sekolah</th>
                    <th width="5%" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody id="tBody">
                    @foreach($teams as $team)
                    <tr>
                        @php
                        if ($team['status'] == 'verified') $badgeColor = 'badge badge-success';
                        else if ($team['status'] == 'unverified') $badgeColor = 'badge badge-warning';
                        else $badgeColor = 'badge badge-neutral';
                        @endphp
                        <td width="5%" class="text-center">{{ $team['id'] }}</td>
                        <td width="20%" class="text-center">{{ $team['name'] }}</td>
                        <td width="10%" class="text-center">
                            <div class="{{ $badgeColor }} font-medium">{{ $team['status'] }}</div>
                        </td>
                        <td width="30%">
                            <ul>
                                @foreach($team->participants as $participant)
                                    <li class="mb-2">{{ $participant->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td width="30%" class="text-center">{{ $team['school_name'] }}</td>
                        <td width="5%">
                            <div class="flex flex-col gap-2 py-1">
                                <button class="btn btn-outline btn-info btn-sm rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </button>
                                <button class="btn btn-outline btn-error btn-sm rounded-md" onclick="deactivateTeam('{{ $team['name'] }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--      Pagination      --}}
        <div class="mt-6">
            {{ $teams->onEachSide(1)->withQueryString()->links() }}
        </div>

        {{--    Modal Deactivated    --}}
        <dialog id="modalDeactivated" class="modal">
            <div class="modal-box rounded-md p-4">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <form action="{{ route('admin.teams.deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" id="deactivatedTeam" name="team">
                    <h3 class="font-bold text-xl lg:text-2xl">Deactivate Team</h3>
                    <p class="py-4">Apakah anda yakin untuk menonaktifkan tim ini?</p>
                    <div class="divider my-2"></div>
                    <div class="grid grid-cols-3">
                        <button class="btn btn-error col-span-1 col-end-4 font-medium" type="submit">Deactivate</button>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>
@endsection

@section('scripts')
    <script>
        let deactivatedModal = document.getElementById('modalDeactivated');
        let deactivatedTeam = document.getElementById('deactivatedTeam');
        const deactivateTeam = (team) => {
            deactivatedTeam.value = team;
            deactivatedModal.showModal();
        }
    </script>
@endsection
