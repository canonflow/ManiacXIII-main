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

        @error('username')
            <div role="alert" class="alert alert-error mb-3 rounded-md">
                <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span><strong>{{ $message }}</strong></span>
                </div>
            </div>
        @enderror
        @error('password')
            <div role="alert" class="alert alert-error mb-3 rounded-md">
                <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span><strong>{{ $message }}</strong></span>
                </div>
            </div>
        @enderror
        @error('name')
            <div role="alert" class="alert alert-error mb-3 rounded-md">
                <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span><strong>{{ $message }}</strong></span>
                </div>
            </div>
        @enderror

        <div class="overflow-auto" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead>
                    <tr>
                        <th width="5%" class="text-center py-3">ID</th>
                        <th width="30%" class="text-center py-3">Nama</th>
                        <th width="30%" class="text-center py-3">Username</th>
                        <th width="30%" class="text-center py-3">Role</th>
                        <th width="5%" class="py-3">
                            <button class="btn btn-success btn-outline btn-sm rounded-md px-4" onclick="addUser()">
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


            {{--    Modal Add Users    --}}
            <dialog id="modalAdd" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box p-0">
                    <div class="header p-4 text-white bg-secondary">
                        <h3 class="font-medium text-lg">Add User</h3>
                    </div>
                    <form class="flex flex-col p-4 gap-y-3" action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        {{--  Role  --}}
                        <label class="form-control w-full">
                            <div class="label"><span class="label-text">Role</span></div>
                            <select class="select select-bordered rounded-md" name="role">
                                <option value="admin" selected>admin</option>
                                <option value="penpos">penpos</option>
                            </select>
                        </label>

                        {{--   Username   --}}
                        <label class="form-control w-full">
                            <div class="label"><span class="label-text">Username</span></div>
                            <input type="text" placeholder="Username" class="input input-bordered rounded-md" name="username"/>
                        </label>

                        {{--   Password   --}}
                        <label class="form-control w-full">
                            <div class="label"><span class="label-text">Password (min. 8)</span></div>
                            <div class="join">
                                <input
                                    type="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    class="input input-bordered rounded-md join-item w-5/6"
                                    name="password"
                                    id="password"
                                />
                                <label class="swap swap-rotate join-item w-1/6 border border-warning rounded-md">
                                    <!-- this hidden checkbox controls the state -->
                                    <input type="checkbox" class="opacity-0" id="show-password-toggle"/>
                                    <!-- Show icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="swap-off w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    <!-- Hide icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="swap-on w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </label>
                            </div>
                        </label>

                        {{--   Password Confirm   --}}
                        <label class="form-control w-full">
                            <div class="label"><span class="label-text">Confirm Password</span></div>
                            <div class="join">
                                <input
                                    type="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    class="input input-bordered rounded-md join-item w-5/6"
                                    name="password_confirmation"
                                    id="password-confirm"
                                />
                                <label class="swap swap-rotate join-item w-1/6 border border-warning rounded-md">
                                    <!-- this hidden checkbox controls the state -->
                                    <input type="checkbox" class="opacity-0" id="show-password-confirmation-toggle"/>
                                    <!-- Show icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="swap-off w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <!-- Hide icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="swap-on w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </label>
                            </div>
                        </label>

                        {{--   Name   --}}
                        <label class="form-control w-full">
                            <div class="label"><span class="label-text">Nama User</span></div>
                            <input type="text" placeholder="Nama User" class="input input-bordered rounded-md" name="name"/>
                        </label>

                        <div class="divider"></div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-success btn-outline px-6 py-2 rounded-md">Submit</button>
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
        // ===== Delete User =====
        const modalDelete = document.getElementById('modalDelete');
        const deleteUsername = document.getElementById('username');

        const deleteModal = (user) => {
            deleteUsername.value = user;
            modalDelete.showModal();
        }

        // ===== Add User =====
        // Modal Add
        const addModal = document.getElementById('modalAdd');
        const addUser = () => {
            addModal.showModal();
        }

        // Password
        const password = document.getElementById('password');
        const passwordToggle = document.getElementById('show-password-toggle');
        passwordToggle.addEventListener('change', function () {
            (this.checked) ? password.type = "text" : password.type = 'password';
        });

        // Password Confirmation
        const passwordConfirm = document.getElementById('password-confirm');
        const passwordConfirmToggle = document.getElementById('show-password-confirmation-toggle');
        passwordConfirmToggle.addEventListener('change', function () {
            (this.checked) ? passwordConfirm.type = 'text' : passwordConfirm.type = 'password';
        })
    </script>
@endsection
