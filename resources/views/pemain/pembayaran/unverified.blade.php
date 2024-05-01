@extends('pemain.pembayaran.layout', ["title" => "Unverified", "heading" => "Verifikasi Bukti Pembayaran", "step2" => true])

@section("content")
    <h2 class="pt-3 sm:pb-0 text-xl font-semibold">Data Anda Sedang Kami Verifikasi</h2>
    <div class="divider my-0"></div>
{{--    <div class="mockup-browser border bg-base-100">--}}
{{--        <div class="mockup-browser-toolbar">--}}
{{--            <div class="input">maniacifubaya.com</div>--}}
{{--        </div>--}}
{{--        <div class="flex flex-col items-center justify-center lg:px-4 py-16 bg-base-300">--}}
{{--            <img src="{{ asset('asset2024') }}/verification.svg" class="w-1/4 md:w-1/6" draggable="false">--}}
{{--            <div class="grid grid-cols-1 lg:grid-cols-3 mt-6 bg-base-200 py-4 px-8 rounded-md">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex flex-col items-center bg-base-300 border rounded-xl overflow-hidden">
        <div class="w-full">
            <div class="flex justify-center bg-base-100 py-3">
                <div class="bg-base-200 py-0.5 px-2 rounded-lg flex items-center gap-3 pr-12 md:pr-24 lg:pr-40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="stroke" class="w-4 h-4 stroke-secondary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span class="font-medium">maniacifubaya.com</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center px-4 py-16 bg-base-300">
            <img src="{{ asset('asset2024') }}/verification.svg" class="w-2/3 sm:w-1/2 md:w-1/4" draggable="false">
            <div class="flex flex-col justify-center md:flex-row md:items-center mt-6 bg-base-200 py-4 px-8 rounded-md gap-3">
                <p class="font-medium text-center"><span class="text-xl md:text-md">Maniac</span><br /><span class="text-2xl md:text-xl">XIII</span></p>
                <div class="divider divider-vertical md:divider-horizontal divider-secondary my-0 md:mx-0"></div>
                <div class="flex flex-col items-start">
                    <p class="font-medium mb-3 md:mb-0">Harap Menunggu Proses Verifikasi Data</p>
                    <p class="text-sm">Apabila terjadi kesalahan, dapat menghubungi: <a target="_blank" href="https://wa.me/6285104914848" style="cursor: pointer !important;" class="font-bold text-primary">Fiorello Austin Ardianto (085104914848)</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
