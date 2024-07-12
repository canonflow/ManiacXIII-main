<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GAME BESAR MANIAC</title>
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.ico" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="{{ asset('css') }}/gamebes.css">
    {{-- <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css') }}/css/font.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: "Cinzel";
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrap-all">
        <div class="absolute w-1/2 inset-y-80 z-20">
            <dialog id="my_modal_3" class="modal z-20">
                <div class="modal-box store">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white">✕</button>
                    </form>
                    <h1 class="text-2xl text-center py-2.5">STORE</h1>
                    <div class="grid grid-cols-3">
                        <img onclick="buyBackPack()" class="img-add-on"
                            src="{{ asset('asset2024') }}/game/item/backpack.png" alt="backpack">
                        <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/cycling-damage.png"
                            alt="cycling-damage">
                        <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/cycling-limited-potion.png"
                            alt="cycling-limited-potion">
                        <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/dragon-breath.png"
                            alt="dragon-breath">
                        <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/restore.png" alt="restore">
                        <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/ultimate-cycle.png"
                            alt="ultimate-cycle">
                    </div>
                </div>
            </dialog>
        </div>
        <!-- Informasi -->
        <div class="atas-kiri ml-12 mt-2 ">
            <h2 id="status-buff" class="text-3xl py-3 text-amber-400">Status</h2>
            <h4>Nama Tim : </h4>
            <select id="pID" class="js-example-basic-single text-black w-100" name="state">
                <option selected disabled value="">Select Player</option>
                @foreach ($players as $p)
                    <option name="{{ $p->id }}" value="{{ $p->id }}">{{ $p->team_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="atas-tengah">
            <div class="health-bar"></div>
            <button class="btn btn-primary mt-3" id="btnPusher">Test Pusher (Buka Console)</button>
        </div>
        <div class="atas-kanan mr-12 mt-6">
            <h6>Dragon Breath : <span id="dragonBreath"></span></h6>
            <h6>Max Backpack : 1500</h6>
            <h6>Cycle : <span id="cycle"></span></h6>
        </div>
        <div class="absolute inset-y-80 right-3 z-20">
            <h5 class="text-white mr-10">Number of Attack</h5>
            <p class="text-5xl text-white text-right mr-10" id="numOfAttack"></p>
        </div>
        <div
            class="bawah-tengah flex absolute w-1/4 bottom-0 start-1/2 p-5 font-medium rounded-t-lg z-20 justify-center">
            <button id="basic-attack" class="btn w-1/2 border-none bg-emerald-900 text-white text-xl"><i
                    class="fas fa-dragon"></i> Basic</button>
            {{-- <div id="cycling-drag"><a href="">Cycling Drag</a></div> <!-- Sementara nantinya ini gambar --> --}}
            {{-- <div id="ultimate"><a href="">Ultimate</a></div> <!-- Sementara nantinya ini gambar --> --}}
            <button id="btnStore" class="btn bg-emerald-900 w-1/2 border-none text-white text-xl"><i
                    class="fas fa-store"></i>
                Store</button>
        </div>
        <div style="width: 15%; height: 20%;" class="px-2 py-4 absolute left-0 bottom-0 z-20 rounded-r-lg">
            <img id="viking" class="w-32 h-auto mx-auto" id="dragon-cycle"
                src="{{ asset('asset2024/game/dragon/teens.png') }}" alt="dragon-cycle">
            <h6 id="text-cycle" class="text-center text-white m-0 p-0 mt-2">Teens</h6>
        </div>
        <!-- Informasi -->

        <div class="position-relative">
            <img src="{{ asset('asset2024/game/bg-belakang.png') }}" alt="Background" class="bg-belakang">

            <!-- Naga Alpha -->
            <div class="wrap-dragon-alpha">
                <img id="alpha" class="dragon-alpha top-8 left-8 w-11/12"
                    src="{{ asset('asset2024/game/alpha/idle.gif') }}" alt="Dragon Alpha">
            </div>
            <!-- Naga Alpha -->

            <!-- Naga Viking -->
            <div class="wrap-dragon-viking">
                <img src="{{ asset('asset2024/game/dragon-viking.png') }}" alt="Dragon Viking"
                    class="absolute bottom-0 right-0 w-auto">
            </div>
            <!-- Naga Viking -->

            <img src="{{ asset('asset2024/game/bg-depan.png') }}" class="bg-depan">
        </div>
    </div>
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#btnStore").click(function(e) {
            e.preventDefault();
            let playerId = $("#pID").val();
            if (playerId != null) {
                my_modal_3.showModal()
            } else {
                Swal.fire({
                    title: 'Player not found!',
                    text: "Please select a player",
                    icon: 'info',
                    confirmButtonText: 'Cool'
                })
            }
        });


        //***** Store Item *****//
        const buyBackPack = () => {
            // Function body
            let playerId = $("#pID").val();
            console.log(playerId);
            $.ajax({
                type: "POST",
                url: "{{ route('si.buyBackpack', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                        confirmButtonText: 'Cool'
                    })
                }
            });
        };

        $("#btnPusher").click(function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('si.test.pusher') }}',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });

        $('#pID').change(function(e) {
            e.preventDefault();
            var playerId = $(this).val(); // Replace with the actual player ID
            console.log(playerId);
            $.ajax({
                url: "{{ route('si.player.detail', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                method: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": {
                        'player': playerId
                    }
                },
                success: function(response) {
                    console.log(response);
                    if (response.isError) {
                        Swal.fire({
                            title: "Game Besar hasn't opened yet",
                            text: response.msg,
                            icon: 'info',
                            confirmButtonText: 'Cool'
                        });
                        return;
                    } 
                    $('#cycle').text(response.player.cycle);
                    $('#dragonBreath').text(response.player.dragon_breath);
                    let dragon = response.dragon;
                    $("#viking").attr("src", "{{ asset('asset2024/game/dragon/image') }}"
                        .replace('image', dragon.img_url));
                    $('#text-cycle').text(dragon.name);

                },
                error: function(xhr) {


                }
            });
        });

        $('#basic-attack').click(function(e) {
            e.preventDefault();
            var playerId = $('#pID').val();
            $.ajax({
                type: "post",
                url: "{{ route('si.attack', ['player' => ':player_id']) }}".replace(':player_id',
                    playerId),
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        });
                        return;
                    } 

                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                        confirmButtonText: 'Cool'
                    });

                    switch (response.dragon) {
                        case "baby":
                            $("#viking").attr("src",
                                "{{ asset('asset2024/game/dragon/baby.png') }}");
                            break;
                        case "teenager":
                            $("#viking").attr("src",
                                "{{ asset('asset2024/game/dragon/teens.png') }}");
                            break;
                        case "adult":
                            $("#viking").attr("src",
                                "{{ asset('asset2024/game/dragon/adult.png') }}");
                            break;
                        case "elder":
                            $("#viking").attr("src",
                                "{{ asset('asset2024/game/dragon/elder.png') }}");
                            break;
                        default:
                            $("#viking").attr("src",
                                "{{ asset('asset2024/game/dragon/egg.png') }}");
                            break;
                    }
                    $("#alpha").attr("src", "{{ asset('asset2024/game/alpha/diserang.gif') }}");
                    setTimeout(() => {
                        $("#alpha").attr("src",
                            "{{ asset('asset2024/game/alpha/idle.gif') }}");
                    }, 4000);
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Player is not found!',
                        text: 'Please select the player',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })

                }
            });

        });
    </script>
    {{--  PUSHER  --}}
    @vite('resources/js/app.js')
    <script type="module">
        window.Echo.channel('update-gamebesar')
            .listen('UpdateGameBesar', (event) => {
                console.log(event);
                $('#numOfAttack').text(event.numOfAttack);
                if (event.buff == true) {
                    $('#status-buff').text("Buff");

                } else if (event.willAttack == true) {
                    $('#status-buff').text("Debuff");
                    $("#alpha").attr("src", "{{ asset('asset2024/game/alpha/attack.gif') }}");
                    setTimeout(() => {
                        $("#alpha").attr("src", "{{ asset('asset2024/game/alpha/idle.gif') }}");
                    }, 3000);

                }

            });
        window.Echo.private('private-update-debuff.{{ auth()->user()->id }}')
            .listen('UpdateDebuff', (event) => {
                console.log(event);
            });
        // Buat Update Harga yg kumulatif
        window.Echo.private('private-update-price.{{ auth()->user()->id }}')
            .listen('UpdateCumulativePrice', (event) => {
                console.log(event);
            });
    </script>
</body>

</html>
