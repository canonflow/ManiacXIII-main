@extends('supersi.layout.index', ['pageActive' => 'super-si.rally', 'pageTitle' => 'Rally Games Detail'])

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
                {{ $rallyGame->name }}
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
                <span>{!! session()->get('updateSuccess') !!}</span>
            </div>
        @elseif(session()->has('deleteSuccess'))
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
                <span>{!! session()->get('deleteSuccess') !!}</span>
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
        @error('point_id')
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
        <div class="overflow-auto rounded" style="max-height: 450px">
            <table class="table table-xs table-pin-cols table-pin-rows">
                <thead>
                    <tr class="text-slate-900 font-medium" style="font-size: 1.1rem;">
                        <th width="25%" class="text-center py-3">Name</th>
                        <th width="25%" class="text-center">Score</th>
                        <th width="50%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tBody">
                @if(count($scores) != 0)
                    @foreach($scores as $score)
                        <tr class="text-slate-900 font-medium" style="font-size: 0.9rem;">
                            <td width="25%" class="text-center py-5">{{ $score->player->team->name }}</td>
                            <td width="25%" class="text-center">{{ $score->point }}</td>
                            <td class="" width="50%">
                                <div class="grid grid-cols-2 gap-3">
                                    <button
                                        class="bg-sky-500 text-slate-50 font-semibold py-2.5 rounded select-none hover:bg-sky-400 active:scale-95 transition-all"
                                        onclick="openUpdateModal('{{ $score->id }}')"
                                    >
                                        Update
                                    </button>
                                    <button
                                        class="bg-red-500 text-slate-50 font-semibold py-2.5 rounded select-none hover:bg-red-400 active:scale-95 transition-all"
                                        onclick="openDeleteModal('{{ $score->id }}')"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="3"><p class="font-medium text-lg text-slate-900 text-center">No Scores</p></td></tr>
                @endif
                </tbody>
            </table>
        </div>

        {{--      Pagination      --}}
        <div class="mt-6">
            {{ $scores->onEachSide(1)->withQueryString()->links('pagination::simple-tailwind') }}
        </div>
    </div>

    {{--  Update Modal  --}}
    <dialog id="updateModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box bg-slate-800">
            <h3 class="text-lg font-bold">Update Score</h3>
            <form action="" method="POST" id="formUpdate">
                @csrf
                <label class="form-control w-full rounded">
                    <div class="label">
                        <span class="label-text text-slate-50">Point</span>
                    </div>
                    <select
                        class="select select-bordered rounded bg-slate-300 text-slate-800 font-medium"
                        required
                        name="point_id"
                    >
                        <option disabled selected>Pick one</option>
                        @foreach($points as $point)
                            <option value="{{ $point->id }}" name="point_id">{{ $point->point }}</option>
                        @endforeach
                    </select>
                </label>
                <button
                    class="w-full bg-green-600 text-slate-50 font-semibold mt-4 py-2.5 px-4 rounded-lg select-none hover:bg-green-500 active:scale-95 transition-all"
                >
                    Update
                </button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="bg-slate-600 text-slate-50 font-semibold py-2.5 px-4 rounded-lg select-none hover:bg-slate-500 active:scale-95 transition-all">Close</button>
{{--                    <button class="btn">Close</button>--}}
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    {{--  Delete Modal --}}
    <dialog id="deleteModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box bg-slate-800">
            <h3 class="text-lg font-bold">Delete Score</h3>
            <form action="" method="POST" id="formDelete">
                @csrf
                <button
                    class="w-full bg-red-600 text-slate-50 font-semibold mt-4 py-2.5 px-4 rounded-lg select-none hover:bg-red-500 active:scale-95 transition-all"
                >
                    Delete
                </button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="bg-slate-600 text-slate-50 font-semibold py-2.5 px-4 rounded-lg select-none hover:bg-slate-500 active:scale-95 transition-all">Close</button>
                    {{--                    <button class="btn">Close</button>--}}
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
@endsection

@section('scripts')
    <script>
        const rallyId = '{{ $rallyGame->id }}';
        const updateModal = $("#updateModal");
        const formUpdate = $("#formUpdate");
        const deleteModal = $("#deleteModal");
        const formDelete = $("#formDelete");

        const openUpdateModal = (id) => {
            let url = `{{ route('super-si.index') }}/rallyGame/${rallyId}/${id}/score/update`;
            formUpdate.attr('action', url);
            updateModal[0].showModal();
        }

        const openDeleteModal = (id) => {
            let url = `{{ route('super-si.index') }}/rallyGame/${rallyId}/${id}/score/delete`;
            formDelete.attr("action", url);
            deleteModal[0].showModal();
        }
    </script>
@endsection
