<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GAME BESAR MANIAC</title>
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.ico" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css') }}/gamebes.css">

</head>

<body>
    <div class="wrap-all">
        <img src="{{ asset('asset2024/bg-gamebes-sementara.jpg') }}" alt="Background" class="bg">
        <!-- Menu Pop Up -->
        <!-- Menu Pop Up Items Add Ons -->
        <div class="pop-up-item display-none" id="popUpItemAddOns">
            <div class="wrap-pop-up-item">
                <div class="close-pop-up-item" id="closePopUpItemAddOns">Close</div>
                <h1>Masuk Menu Pop Up Item Add Ons</h1>
                <div class="add-ons">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/backpack.png" alt="backpack">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/cycling-damage.png" alt="cycling-damage">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/cycling-limited-potion.png"
                        alt="cycling-limited-potion">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/dragon-breath.png" alt="dragon-breath">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/restore.png" alt="restore">
                    <img class="img-add-on" src="{{ asset('asset2024') }}/game/ultimate-cycle.png" alt="ultimate-cycle">
                </div>
            </div>
        </div>
        <!-- Menu Pop Up Items Add Ons -->
        <!-- Menu Pop Up Store -->
        {{-- <div class="pop-up-store display-none" id="popUpStore" style="z-index: 100">
            <div class="wrap-pop-up-store">
                <div class="close-pop-up-store" id="closePopUpStore">Close</div>
                <h1>Masuk Menu Pop Up Store Add Ons</h1>
            </div>
        </div> --}}
        <!-- Informasi -->
        <div class="atas-kiri ml-4 mt-2">
            <p>Debuff</p>
            <p>Buff</p>
            <select class="js-example-basic-single " name="state">
                <option value="AL">Alabama</option>
                ...
                <option value="WY">Wyoming</option>
            </select>
        </div>
        <div class="atas-tengah">
            <div class="health-bar"></div>
            <button class="btn btn-primary mt-3" id="btnPusher">Test Pusher (Buka Console)</button>
        </div>
        <div class="atas-kanan mr-4 mt-2">
            <p>Dragon Breath : 5</p>
            <p>Max Backpack : 1500</p>
            <p>Cycle : 600</p>
        </div>
        <div class="bawah-tengah">
            <div><a href="">Basic</a></div> <!-- Sementara nantinya ini gambar -->
            <div><a href="">Cycling Drag</a></div> <!-- Sementara nantinya ini gambar -->
            <div><a href="">Ultimate</a></div> <!-- Sementara nantinya ini gambar -->
            <div id="store">Store</div> <!-- Sementara nantinya ini gambar -->
            <div id="addOns">Add Ons</div> <!-- Sementara nantinya ini gambar -->
        </div>
        <!-- Informasi -->

        <!-- Naga Alpha -->
        <div class="wrap-dragon-alpha">
            <img src="{{ asset('asset2024/Dragon.png') }}" alt="Dragon Alpha" class="dragon-alpha">
        </div>
        <!-- Naga Alpha -->

        <!-- Naga Viking -->
        <div class="wrap-dragon-viking">
            <img src="{{ asset('asset2024/Dragon.png') }}" alt="Dragon Viking" class="dragon-viking">
        </div>
        <!-- Naga Viking -->


    </div>
    <script src="{{ asset('js') }}/jquery.min.js"></script>
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
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        })
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
