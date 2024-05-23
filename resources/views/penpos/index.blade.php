@extends('penpos.layout.index')
@php($user = auth()->user())

@section('content')
    <div role="alert" class="alert text-start rounded-lg justify-start">
{{--        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
        <div>
            <span>Hi, <strong>{{ $user->username }}</strong>! Have a nice day :)</span>
        </div>
    </div>
    <div role="alert" class="alert alert-warning rounded-lg mt-4 text-start">
        <div>
            <ul class="list-disc list-inside">
                <li>Selamat Datang di Pos <strong>{{ $user->rallyGame->name }}</strong></li>
                <li>Di sini, anda dapat melakukan penilaian Rally Games</li>
                <li><strong>Scan QR</strong> Tim yang ingin diberi score</li>
                <li>Kemudian, pilih <strong>jumlah score</strong> dan klik button <strong>Submit</strong></li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 mt-4 bg-base-300 rounded p-4">
        <div id="reader" width="600px" style="" class="mb-2"></div>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text font-bold">Tim</span>
            </div>
            <input type="text"
                   {{--                   placeholder="Tim"--}}
                   class="input w-full bg-base-200 text-primary rounded-md font-medium"
                   id="tim"
                   name="tim"
                   value="Tim 1"  {{-- nanti ini dihapus aja klo testingnya udh berhasil --}}
                   readonly
            />
        </label>
        <label class="form-control w-full rounded-lg">
            <div class="label">
                <span class="label-text font-bold">Pilih Score</span>
            </div>
            <select class="select select-bordered bg-base-200 text-primary rounded-md font-medium" name="point_id" id="point_id">
                <option disabled selected>--- Pilih Score ---</option>
                @foreach($points as $point)
                    <option value="{{ $point->id }}" class="font-medium">{{ $point->point }}</option>
                @endforeach
            </select>
        </label>
        <div class="modal-action">
            <button class="btn btn-primary" onclick="submitScore()">Submit</button>
        </div>
    </div>

    <div class="grid grid-cols-1 mt-4">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th width="40%" class="text-center">Tim</th>
                        <th width="30%" class="text-center">Point</th>
                        <th width="30%" class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody id="scoresBody">
                    @foreach($scores as $score)
                        <tr>
                            <td width="40%" class="text-center">{{ $score->player->team->name }}</td>
                            <td width="30%" class="text-center">{{ $score->point->point }}</td>
                            <td width="30%" class="text-center">
                                <button class="btn btn-error btn-md rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    var notyf = new Notyf({
        position: {
            x: 'center',
            y: 'top'
        }
    });

    var showNotifError = (msg, isError = false) => {
        if (isError) {
            notyf.error({
                message: msg,
                duration: 3500,
                dismissible: true
            });
        } else {
            notyf.success({
                message: msg,
                duration: 3500,
                dismissible: true
            });
        }
    }

    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        if ($("#tim").attr("value") != decodedText) {
            notyf.success({
                message: `Sukses Scanning ${decodedText}`,
                duration: 1750,
                dismissible: true
            });
        }

        $("#tim").attr("value", decodedText);
        console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
<script>
    const submitScore = () => {
        // console.log($("#tim").val());
        // console.log($("#point_id").val());
        if ($("#tim").val() == "" || $("#point_id").val() == null) {
            return showNotifError("Silahkan scan QR atau Pilih score yang ingin diinput!", isError=true);
        }

        // return;
        // ===== LANJUTIN AJAX =====
        $.ajax({
            type: 'POST',
            url: '{{ route("penpos.store") }}',
            data: {
                '_token':'{{ csrf_token() }}',
                'tim':$('#tim').val(),
                'point_id' : $('#point_id').val()
            },
            success: function(data) {
                if(data.msg == "YES")
                {
                    return showNotifError("Gagal Submit! Team sudah pernah main di pos ini.", isError = true);
                }
                showNotifError("Berhasil menambahkan poin ke " + data.team)
            },
            error : function(xhr){
                console.log(xhr)
                showNotifError(
                    "Error AJAX! Beberapa kesalahan seperti QR yang tidak terdaftar atau Player tidak terdaftar. Hubungi SI secepatnya!!!",
                    isError=true
                );
            }
        })

    }
</script>
@endsection
