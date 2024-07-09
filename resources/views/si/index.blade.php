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
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
</head>

<body>
    <div class="wrap-all">
        <!-- Menu Pop Up -->
        <!-- Menu Pop Up Items Add Ons -->
        <div class="pop-up-item display-none" id="popUpItemAddOns">
            <div class="wrap-pop-up-item grid-container text-center">
                <div class="close-pop-up-item" id="closePopUpItemAddOns">Close</div>
                <h1>Store</h1>
                <div class="add-ons pt-2">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/backpack.png" alt="backpack">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/cycling-damage.png"
                        alt="cycling-damage">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/cycling-limited-potion.png"
                        alt="cycling-limited-potion">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/dragon-breath.png"
                        alt="dragon-breath">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/restore.png" alt="restore">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/item/     ultimate-cycle.png"
                        alt="ultimate-cycle">
                </div>
            </div>
        </div>
        <!-- Informasi -->
        <div class="atas-kiri ml-4 mt-2 ">
            <p>Debuff</p>
            <p>Buff</p>
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
        <div class="atas-kanan mr-4 mt-2">
            <p>Dragon Breath : <span id="dragonBreath"></span></p>
            <p>Max Backpack : 1500</p>
            <p>Cycle : <span id="cycle"></span></p>
        </div>
        <div class="bawah-tengah">
            <div id="basic-attack"><a href="">Basic</a></div> <!-- Sementara nantinya ini gambar -->
            <div id="cycling-drag"><a href="">Cycling Drag</a></div> <!-- Sementara nantinya ini gambar -->
            <div id="ultimate"><a href="">Ultimate</a></div> <!-- Sementara nantinya ini gambar -->
            <div id="store">Store</div> <!-- Sementara nantinya ini gambar -->
            <div id="addOns">Add Ons</div> <!-- Sementara nantinya ini gambar -->
        </div>
        <!-- Informasi -->

        <div class="position-relative">
            <img src="{{ asset('asset2024/game/bg-belakang.png') }}" alt="Background" class="bg-belakang">

            <!-- Naga Alpha -->
            <div class="wrap-dragon-alpha">
                <img src="{{ asset('asset2024/game/dragon-alpha.png') }}" alt="Dragon Alpha" class="dragon-alpha">
            </div>
            <!-- Naga Alpha -->

            <!-- Naga Viking -->
            <div class="wrap-dragon-viking">
                <img src="{{ asset('asset2024/game/dragon-viking.png') }}" alt="Dragon Viking" class="dragon-viking">
            </div>
            <!-- Naga Viking -->

            <img src="{{ asset('asset2024/game/bg-depan.png') }}" class="bg-depan">
        </div>
    </div>
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script src="{{ asset('js') }}/app.js"></script>
    <script>
        let nodeAddOns = document.getElementById("addOns");
        let nodePopUpItemAddOns = document.getElementById("popUpItemAddOns");
        let nodeClosePopUpItemAddOns = document.getElementById("closePopUpItemAddOns");

        let nodeStore = document.getElementById("store");
        let nodePopUpStore = document.getElementById("popUpStore");
        let nodeClosePopUpStore = document.getElementById("closePopUpStore");

        /* ///////////////////////// */
        /* Menu Pop Up Items Add On */
        /* //////////////////////// */
        $('#addOns').click(function() {
            nodePopUpItemAddOns.setAttribute("class", "pop-up-item display-block");
        });

        $("#closePopUpItemAddOns").click(() => {
            nodePopUpItemAddOns.setAttribute("class", "pop-up-item display-none");
        });
        /* //////////////////////// */
        /* Menu Pop Up Items Add On */
        /* //////////////////////// */

        /* ///////////////// */
        /* Menu Pop Up Store */
        /* ///////////////// */
        $("#store").click(() => {
            nodePopUpStore.setAttribute("class", "pop-up-store display-block");
        });

        $("#closePopUpStore").click(() => {
            nodePopUpStore.setAttribute("class", "pop-up-store display-none")
        });
        /* ///////////////// */
        /* Menu Pop Up Store */
        /* ///////////////// */

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
            $.ajax({
                url: "{{ route('si.player.detail', ['player' => ':player_id']) }}".replace(':player_id',
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
                    $('#cycle').text(response.player.cycle);
                    $('#dragonBreath').text(response.player.dragon_breath);
                    // Handle response data
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // Handle error
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
                },
                error: function(response) {
                    console.log(response.isError);
                    console.log(response.msg);

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
            });
        window.Echo.private('private-update-debuff.{{ auth()->user()->id }}')
            .listen('UpdateDebuff', (event) => {
                console.log(event);
            });
    </script>
</body>

</html>
