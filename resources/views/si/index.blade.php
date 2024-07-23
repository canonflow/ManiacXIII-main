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
    <div class="wrap-all" id="wrap-all">
        <div class="absolute w-1/2 inset-y-80 z-20">
            <dialog id="my_modal_3" class="modal z-20">
                <div class="modal-box store">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white">✕</button>
                    </form>
                    <h1 class="text-2xl text-center py-2.5">STORE</h1>
                    <div class="grid grid-cols-3">
                        {{-- Backpack --}}
                        <div class="animat-item-store flex items-center justify-center flex-col">
                            <img onclick="buyBackPack()" class="img-add-on"
                                src="{{ asset('asset2024') }}/game/item/backpack.png" alt="backpack">
                            <p class="flex justify-center items-center"><span id="hargaBackpack">50</span>
                                <i class="fa-solid fa-arrows-spin ml-1"></i>
                            </p>
                        </div>

                        {{-- Power Skill --}}
                        <div class="animat-item-store flex items-center justify-center flex-col">
                            <img onclick="buyPowerSkill()" class="img-add-on"
                                src="{{ asset('asset2024') }}/game/item/power-skill.png" alt="power-skill">
                            <p>250 <i class="fa-solid fa-arrows-spin ml-1"></i></p>
                        </div>

                        {{-- Potion --}}
                        <div class="animat-item-store flex items-center justify-center flex-col">
                            <img onclick="buyPotion()" class="img-add-on"
                                src="{{ asset('asset2024') }}/game/item/potion.png" alt="potion">
                            <p>200 <i class="fa-solid fa-arrows-spin ml-1"></i></p>
                        </div>

                        {{-- Dragon Breath --}}
                        <div class="animat-item-store flex items-center justify-center flex-col">
                            <img onclick="buyDragonBreath()" class="img-add-on"
                                src="{{ asset('asset2024') }}/game/item/dragon-breath.png" alt="dragon-breath">
                            <p>100 <i class="fa-solid fa-arrows-spin ml-1"></i></p>
                        </div>

                        {{-- Restore --}}
                        <div class="animat-item-store flex items-center justify-center flex-col">
                            <img onclick="buyRestore()" class="img-add-on"
                                src="{{ asset('asset2024') }}/game/item/restore.png" alt="restore">
                            <p class="flex justify-center items-center"><span id="hargaRestore">150</span>
                                <i class="fa-solid fa-arrows-spin ml-1"></i>
                            </p>
                        </div>

                        {{-- Ultimate Cycle --}}
                        <div class="animat-item-store flex items-center justify-center flex-col">
                            <img onclick="buyUltimate()" class="img-add-on"
                                src="{{ asset('asset2024') }}/game/item/ultimate-cycle.png" alt="ultimate-cycle">
                            <p>350 <i class="fa-solid fa-arrows-spin ml-1"></i></p>
                        </div>
                    </div>
                </div>
            </dialog>
        </div>
        <!-- Informasi -->
        <div class="atas-kiri ml-12 mt-2 ">
            <h2 id="status-buff" class="text-3xl py-3 text-amber-400" style="opacity: 0;">Buff</h2>
            <h2 id="status-debuff" class="text-3xl py-3 text-zinc-300" style="opacity: 0;">Debuff</h2>
            <h4>Nama Tim : </h4>
            <select id="pID" class="js-example-basic-single text-black w-100" name="state">
                <option selected disabled value="">Select Player</option>
                @foreach ($players as $p)
                    <option name="{{ $p->id }}" value="{{ $p->id }}">{{ $p->team_name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Health Bar --}}
        <div class="atas-tengah">
            <div class="relative health-bar-container">
                <div class="absolute health-bar health-bar-width" id="health-bar"></div>
            </div>
            {{-- <button class="btn btn-primary mt-3" id="btnPusher">Test Pusher (Buka Console)</button> --}}
        </div>
        <div class="atas-kanan mr-12 mt-6">
            <h6>Dragon Breath : <span id="dragonBreath"></span></h6>
            <h6>Max Backpack : <span id="backpack"></span> </h6>
            <h6>Cycle : <span id="cycle"></span></h6>
        </div>
        <div class="absolute inset-y-80 right-3 z-20">
            <h5 class="text-white mr-10">Number of Attack</h5>
            <p class="text-5xl text-white text-right mr-10" id="numOfAttack"></p>
        </div>
        <div
            class="bawah-tengah flex absolute w-1/4 bottom-0 start-1/2 p-5 font-medium rounded-t-lg z-20 justify-center">
            <button id="basic-attack" style="background-color: #7e0100;"
                class="btn w-1/2 border-none text-white text-xl"><i class="fas fa-dragon"></i>
                Basic</button>
            {{-- <div id="cycling-drag"><a href="">Cycling Drag</a></div> <!-- Sementara nantinya ini gambar --> --}}
            {{-- <div id="ultimate"><a href="">Ultimate</a></div> <!-- Sementara nantinya ini gambar --> --}}
            <button id="btnStore" style="background-color: #7e0100;"
                class="btn w-1/2 border-none text-white text-xl"><i class="fas fa-store"></i>
                Store</button>
        </div>
        <div style="width: 15%; height: 20%;" class="px-2 py-4 absolute left-0 bottom-0 z-20 rounded-r-lg">
            <img id="viking" class="w-32 h-auto mx-auto" id="dragon-cycle"
                src="{{ asset('asset2024/game/dragon/egg.png') }}" alt="dragon-cycle">
            <h6 id="text-cycle" class="text-center text-white m-0 p-0 mt-2">Egg</h6>
        </div>
        <!-- Informasi -->

        <div class="position-relative" id="bg">
            <img src="{{ asset('asset2024/game/bg-belakang.png') }}" alt="Background" class="bg-belakang">

            <!-- Naga Alpha -->
            <div class="wrap-dragon-alpha">
                <img id="alpha" class="dragon-alpha top-8 left-8 "
                    src="{{ asset('asset2024/game/alpha/idle.gif') }}" alt="Dragon Alpha"
                    style="height: 1080px; width: 1920px">
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
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // const borderMerah = () => {
        //     $("#wrap-all").addClass("class", "border-merah");
        // }

        // const borderNormal = () => {
        //     $("#wrap-all").removeClass("border-merah");
        // }

        const borderMerah = () => {
            $("#wrap-all").css("box-shadow", "inset 20px 200px 50px 50px red");
        }

        const borderNormal = () => {
            $("#wrap-all").css("border", "0px solid red");
            $("#wrap-all").css("box-shadow", "none");
        }

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
                    $("#my_modal_3")[0].close();
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                            dangerMode: true
                        });
                        return;
                    }
                    $("#cycle").text(response.cycle);
                    $('#backpack').text(response.backpack);
                    console.log(response);
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                    });

                    // Switch Dragon
                    $('#text-cycle').text(response.dragon);
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
                }
            });

        };

        const buyPowerSkill = () => {
            // Function body
            let playerId = $("#pID").val();
            console.log(playerId);
            $.ajax({
                type: "POST",
                url: "{{ route('si.powerSkill', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#my_modal_3")[0].close();
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                        });
                        return;
                    }
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                    });
                    $("#cycle").text(response.cycle);
                    $('#dragonBreath').text(response.dragon_breath);
                    borderMerah();

                    // Switch Dragon
                    $('#text-cycle').text(response.dragon);
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
                }
            });
        };

        const buyPotion = () => {
            // Function body
            let playerId = $("#pID").val();
            console.log(playerId);
            $.ajax({
                type: "POST",
                url: "{{ route('si.buyPotion', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#my_modal_3")[0].close();
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                        });
                        return;
                    }
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                    });
                    $("#cycle").text(response.cycle);

                    // Switch Dragon
                    $('#text-cycle').text(response.dragon);
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
                }
            });
        };

        const buyDragonBreath = () => {
            // Function body
            let playerId = $("#pID").val();
            console.log(playerId);
            $.ajax({
                type: "POST",
                url: "{{ route('si.buyDragonBreath', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#my_modal_3")[0].close();
                    console.log(response);
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                        });
                        return;
                    }
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                    });
                    $("#cycle").text(response.cycle);
                    $('#dragonBreath').text(response.dragon_breath);

                    // Switch Dragon
                    $('#text-cycle').text(response.dragon);
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
                }
            });
        };

        const buyRestore = () => {
            // Function body
            let playerId = $("#pID").val();
            console.log(playerId);
            $.ajax({
                type: "POST",
                url: "{{ route('si.buyRestore', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#my_modal_3")[0].close();
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                        });
                        return;
                    }
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                    });
                    $("#cycle").text(response.cycle);

                    // Switch Dragon
                    $('#text-cycle').text(response.dragon);
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
                }
            });
        };

        const buyUltimate = () => {
            // Function body
            let playerId = $("#pID").val();
            console.log(playerId);
            $.ajax({
                type: "POST",
                url: "{{ route('si.ultimateAttack', ['player' => ':player_id']) }}".replace(
                    ':player_id',
                    playerId),
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#my_modal_3")[0].close();
                    if (response.isError) {
                        Swal.fire({
                            title: 'ERROR!',
                            text: response.msg,
                            icon: 'error',
                        });
                        return;
                    }
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg,
                        icon: 'success',
                    });
                    $("#cycle").text(response.cycle);
                    $('#dragonBreath').text(response.dragon_breath);

                    // Switch Dragon
                    $('#text-cycle').text(response.dragon);
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
                        });
                        return;
                    }
                    $('#cycle').text(response.player.cycle);
                    $('#dragonBreath').text(response.player.dragon_breath);
                    let dragon = response.dragon;
                    $("#viking").attr("src", "{{ asset('asset2024/game/dragon/image') }}"
                        .replace('image', dragon.img_url));
                    $('#text-cycle').text(dragon.name);
                    $('#backpack').text(response.backpack);
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
                            // confirmButtonText: 'Cool'
                        });
                        return;
                    }

                    Swal.fire({
                        title: 'SUCCESS!',
                        text: response.msg + " damage",
                        icon: 'success',
                        // confirmButtonText: 'Cool'
                    });


                    $('#dragonBreath').text(response.dragon_breath);

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

                    $('#text-cycle').text(response.dragon);

                    if (response.isAttacked) {
                        $("#alpha").attr("src",
                            "{{ asset('asset2024/game/alpha/diserang.gif') }}");
                        setTimeout(() => {
                            $("#alpha").attr("src",
                                "{{ asset('asset2024/game/alpha/idle.gif') }}");
                        }, 2500);
                    }
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Player is not found!',
                        text: 'Please select the player',
                        icon: 'info',
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
                    $("#status-buff").css("opacity", "1");
                } else {
                    $("#status-buff").css("opacity", "0");
                }

                if (event.willAttack) {
                    console.log("saatnya nyerang!");
                    $("#alpha").attr("src", "{{ asset('asset2024/game/alpha/attack.gif') }}");
                    setTimeout(() => {
                        $("#alpha").attr("src", "{{ asset('asset2024/game/alpha/idle.gif') }}");
                    }, 3000);
                }
                let darah = (event.health / 1000000 * 100);
                $("#health-bar").css("width", darah + "%");
            });

        window.Echo.private('private-update-debuff.{{ auth()->user()->id }}')
            .listen('UpdateDebuff', (event) => {
                console.log(event);
                if (event.debuff < 1) $('#status-debuff').css("opacity", "0");
                else $('#status-debuff').css("opacity", "1  ");
            });
        // Buat Update Harga yg kumulatif
        window.Echo.private('private-update-price.{{ auth()->user()->id }}')
            .listen('UpdateCumulativePrice', (event) => {
                console.log(event);
                $("#hargaBackpack").text(event.backpackPrice);
                $("#hargaRestore").text(event.restorePrice);
            });
    </script>
</body>

</html>
