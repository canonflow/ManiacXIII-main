@extends('admin.layout.index', ['pageActive' => 'admin.users', 'pageTitle' => 'Users'])

@section('content')
    <div class="text-sm breadcrumbs gap-1 flex items-center">
        <h1 class="text-xl font-semibold">Admin</h1>
        <div class="divider divider-horizontal mx-0"></div>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}" class="text-secondary font-medium">Users</a></li>
        </ul>
    </div>

    <div class="flex flex-col justify-center content-center w-full bg-gray-800 p-3 rounded-lg">
        @if(session()->has('addSuccess'))
            <div role="alert" class="alert alert-success mb-3 rounded-md">
                <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>Berhasil Menambahkan User <strong>{{ session()->get('addSuccess') }}</strong></span>
                </div>
            </div>
        @elseif(session()->has('deleteSuccess'))
            <div role="alert" class="alert alert-error mb-3 rounded-md">
                <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>Berhasil Menghapus User dengan username <strong>{{ session()->get('deleteSuccess') }}</strong></span>
                </div>
            </div>
        @endif

        <div class="overflow-auto" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead>
                    <tr>
                        <th width="5%" class="text-center py-3">ID</th>
                        <th width="30%" class="text-center py-3">Nama</th>
                        <th width="30%" class="text-center py-3">Username</th>
                        <th width="30%" class="text-center py-3">Role</th>
                        <th width="5%" class="py-3">
                            <button class="btn btn-success btn-outline btn-sm rounded-md px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody id="tBody">
                    @foreach($users as $user)
                        <tr>
                            <td width="5%" class="text-center">{{ $user['id'] }}</td>
                            @php
                                $name = '';
                                $username = $user->username;
                                switch ($user->role) {
                                    case 'admin':
                                        $name = $user->admin->name;
                                        break;
                                        default:
                                            $name = 'undefined';
                                            break;
                                }
                            @endphp
                            <td width="30%" class="text-center py-5">{{ $name }}</td>
                            <td width="30%" class="text-center py-5">{{ $user['username'] }}</td>
                            <td width="30%" class="text-center py-5">{{ $user['role'] }}</td>
                            <td width="5%" class="py-5">
                                <button class="btn btn-error btn-outline btn-sm rounded-md px-4" onclick="deleteModal('{{ $username }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--      Pagination      --}}
        <div class="mt-6">
            {{ $users->onEachSide(1)->withQueryString()->links() }}
        </div>

            {{--    Modal Delete User    --}}
            <dialog id="modalDelete" class="modal">
                <div class="modal-box rounded-md p-4">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <form action="{{ route('admin.users.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="username" name="username">
                        <h3 class="font-bold text-xl lg:text-2xl">Delete User</h3>
                        <p class="py-4">Apakah anda yakin untuk menghapus user ini?</p>
                        <div class="divider my-2"></div>
                        <div class="grid grid-cols-3">
                            <button class="btn btn-error col-span-1 col-end-4 font-medium" type="submit">Delete</button>
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
        const modalDelete = document.getElementById('modalDelete');
        const deleteUsername = document.getElementById('username');
        const deleteModal = (user) => {
            deleteUsername.value = user;
            modalDelete.showModal();
        }
    </script>
@endsection
