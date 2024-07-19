@extends('supersi.layout.index', ['pageActive' => 'super-si.leaderboard', 'pageTitle' => 'Leaderboard Semifinal'])

@section('cdn')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('styles')
    <style>
        .select2-container.select2-container--default .select2-selection--multiple {
            height: 39px;
            --border-opacity: 1 !important;
            border-color: #e2e8f0 !important;
            border-color: rgba(226, 232, 240, var(--border-opacity)) !important;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice {
            height: 26px;
            display: flex;
            align-items: center;
            margin-top: 0;
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
            padding-right: 0.5rem;
            margin-right: 0.5rem;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:first-child {
            margin-left: -0.25rem;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
            margin-left: 0.25rem;
            margin-right: 0.5rem;
        }

        .select2-container.select2-container--default .select2-search--dropdown .select2-search__field {
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
        }

        .select2-container.select2-container--default .select2-results__option {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .select2-container.select2-container--default .select2-results__option--highlighted[aria-selected] {
            --bg-opacity: 1;
            background-color: #e2e8f0;
            color: #0f172a;
            font-weight: 500;
            /*background-color: #1C3FAA;*/
            /*background-color: rgba(28, 63, 170, var(--bg-opacity));*/
        }

        .select2-container--default .select2-results__option--selected {
            background-color: #cbd5e1 !important;
            color: #0f172a;
            font-weight: 500;
        }

        .select2-container .select2-selection.select2-selection--single {
            height: 39px;
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
        }

        .select2-container .select2-selection .select2-selection__rendered {
            height: 100%;
            display: flex;
            align-items: center;
            padding-left: 0.75rem;
            padding-right: 2rem;
        }

        .select2-container .select2-selection .select2-selection__arrow {
            width: 32px;
            height: 100%;
        }

        .select2-container .select2-dropdown {
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-weight: 600 !important;
        }

        div:where(.swal2-container) div:where(.swal2-popup) {
            background-color: #334155;
            color: #e2e8f0;
        }

        button, [type='button'], [type='reset'], [type='submit'] {
            background-color: #1e293b;
            color: #e2e8f0;
        }
    </style>
@endsection

@section('content')
    {{--  Breadcrumbs  --}}
    <div class="breadcrumbs text-sm">
        <ul>
            <li>
                <a href="{{ route('super-si.leaderboard.index') }}" class="font-medium">
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
                    Leaderboard
                </a>
            </li>
        </ul>
    </div>

    {{--  Content  --}}
    <div class="flex flex-col justify-center content-center w-full bg-slate-400 p-3 rounded-md mt-4">
        {{--    Summarize    --}}
        <div class="bg-slate-500 w-full mb-5 rounded p-4">
            <h1
                class="text-center bg-slate-900 text-slate-100 mb-5 rounded py-3 text-lg font-semibold"
            >
                Summarize Semifinal Score For Final
            </h1>
            <div class="grid grid-cols-1 gap-y-4 md:gap-y-2 xl:grid-cols-3">
                <div class="select2-container flex justify-center">
                    <label for="" class="mr-5 font-medium">Choose Contest: </label>
                    <select class="js-example-basic-single" name="contest" id="contest-select" required>
                        <option selected disabled>-- Pick One --</option>
                        @foreach($contests as $contest)
                            <option value="{{ $contest->id }}">{{ $contest->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button
                    class="bg-slate-900 text-slate-50 font-semibold py-2 px-5 rounded hover:bg-slate-700 active:scale-95 transition-all xl:col-start-3 xl:col-end-4"
                    id="btnSummarize"
                >
                    Summarize
                </button>
            </div>
        </div>

        {{--    Table    --}}
        <div class="overflow-auto rounded">
            <h1 class="text-center font-bold text-xl py-2">Leaderboard Rally and Game Besar</h1>
            <div class="overflow-auto rounded" style="max-height: 450px">
                <table class="table table-xs table-pin-cols table-pin-rows">
                    <thead>
                    <tr class="text-slate-900 font-medium" style="font-size: 1.1rem;">
                        <th width="20%" class="text-center py-3 bg-slate-100">Rank</th>
                        <th width="20%" class="text-center bg-slate-100">Team</th>
                        <th width="20%" class="text-center bg-slate-100">Rally</th>
                        <th width="20%" class="text-center bg-slate-100">Gamebesar</th>
                        <th width="20%" class="text-center bg-slate-100">Semifinal Score</th>
                    </tr>
                    </thead>
                    <tbody id="tBody">
                    @php($rank = 1)
                    @foreach($leaderboard as $l)
                        @php($bg = ($rank <= 10) ? "bg-green-100" : "bg-red-100")
                        <tr class="text-slate-900 font-medium {{ $bg }} select-none">
                            <td width="20%" class="text-center py-5">{{ $rank }}</td>
                            <td width="20%" class="text-center">{{ $l->name }}</td>
                            <td width="20%" class="text-center">{{ $l->rally }}</td>
                            <td width="20%" class="text-center">{{ $l->gamebesar }}</td>
                            <td width="20%" class="text-center" style="font-size: 1rem;">
                                <span class="bg-slate-700 py-2 px-3 rounded-md font-bold text-slate-50">
                                    {{ $l->total_score }}
                                </span>
                            </td>
                        </tr>
                        @php($rank++)
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

{{--        --}}{{--      Pagination      --}}
{{--        <div class="mt-6">--}}
{{--            {{ $rallyGames->onEachSide(1)->withQueryString()->links('pagination::simple-tailwind') }}--}}
{{--        </div>--}}
    </div>
@endsection

@section('scripts')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $("#contest-select").select2();
        });

        $("#btnSummarize").click(function () {
            let contest_id = $("#contest-select").val();

            if (!contest_id) {
                Swal.fire({
                    title: 'Error',
                    text: "Silahkan Pilih Contest Terlebih dahulu!",
                    icon: 'error',
                });
                return;
            }
            console.log(contest_id);
            console.log("{{ route('super-si.summarize') }}");

            $.ajax({
                url: "{{ route('super-si.summarize') }}",
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'contest_id': contest_id
                },
                success: function (data) {
                    let scores = data.scores;
                    let csv = [];

                    for (let i = 0; i < scores.length; i++) {
                        let row =[];

                        // For Header
                        if (i === 0) {
                            for (const header of Object.keys(scores[i])) {
                                row.push(`"${header}"`);
                            }
                            csv.push(row.join(","));
                            row = [];
                        }

                        // For Data
                        for (const [key, val] of Object.entries(scores[i])) {
                            row.push(`"${val}"`);
                        }
                        csv.push(row.join(","));
                    }

                    let csv_string = csv.join("\n");
                    let filename = `export_rekap_semifinal_${new Date().toLocaleDateString()}.csv`;
                    console.log(csv_string)
                    // Create Link Download
                    let link = document.createElement('a');
                    link.style.display = 'none';
                    link.setAttribute('target', '_blank');
                    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
                    link.setAttribute('download', filename);
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    Swal.fire({
                        title: 'Success!',
                        text: "Berhasil mengunduh rekap semifinal!",
                        icon: 'success',
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        })
    </script>
@endsection
