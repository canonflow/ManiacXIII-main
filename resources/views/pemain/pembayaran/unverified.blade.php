@extends('pemain.pembayaran.layout', ["title" => "Unverified", "heading" => "Upload Bukti Pembayaran", "step2" => true])

@section("content")
    <p class="pb-3 sm:pb-0 break-words">
        Anda dapat melihat <strong>Available Contest</strong>, <strong>Upcoming Contest</strong>, and <strong>Finished Contest</strong> di sini.
    </p>
    <div role="alert" class="alert alert-success rounded-md py-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span>Mohon lakukan refresh page untuk update data contest.</span>
    </div>

@endsection
