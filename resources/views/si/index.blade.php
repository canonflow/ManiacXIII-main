<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GAME BESAR MANIAC</title>
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.ico" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css')}}/gamebes.css">
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
            </div>
        </div>
        <!-- Menu Pop Up Items Add Ons -->
        <!-- Menu Pop Up Store -->
        <div class="pop-up-store display-none" id="popUpStore">
            <div class="wrap-pop-up-store">
                <div class="close-pop-up-store" id="closePopUpStore">Close</div>
                <h1>Masuk Menu Pop Up Store Add Ons</h1>
            </div>
        </div>
        <!-- Menu Pop Up Store -->
        <!-- Menu Pop Up -->
        
        <!-- Informasi -->
        <div class="atas-kiri">
            <p>Debuff</p>
            <p>Buff</p>
        </div>
        <div class="atas-tengah">
            <div class="health-bar"></div>
        </div>
        <div class="atas-kanan">
            <p>Dragon Breath : 5</p>
            <p>Max Backpack : 1500</p>
            <p>Cycle : 600</p>
        </div>
        <div class="bawah-tengah">
            <div><a href="">Basic</a></div>             <!-- Sementara nantinya ini gambar -->
            <div><a href="">Cycling Drag</a></div>      <!-- Sementara nantinya ini gambar -->
            <div><a href="">Ultimate</a></div>          <!-- Sementara nantinya ini gambar -->
            <div id="store">Store</div>             <!-- Sementara nantinya ini gambar -->
            <div id="addOns">Add Ons</div>           <!-- Sementara nantinya ini gambar -->
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
    <script src="{{asset('js')}}/jquery.min.js"></script>
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
    $('#addOns').click(function(){
        nodePopUpItemAddOns.setAttribute("class", "pop-up-item display-block");
    });
    
    $("#closePopUpItemAddOns").click(()=>{
        nodePopUpItemAddOns.setAttribute("class", "pop-up-item display-none");
    });
    /* //////////////////////// */
    /* Menu Pop Up Items Add On */
    /* //////////////////////// */

    /* ///////////////// */
    /* Menu Pop Up Store */
    /* ///////////////// */
    $("#store").click(()=>{
        nodePopUpStore.setAttribute("class", "pop-up-store display-block");
    });
    
    $("#closePopUpStore").click(()=>{
        nodePopUpStore.setAttribute("class", "pop-up-store display-none")
    });
    /* ///////////////// */
    /* Menu Pop Up Store */
    /* ///////////////// */
</script>
</body>
</html>