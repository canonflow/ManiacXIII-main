@extends('pemain.layout.layout', ['title' => 'Submition'])

@section('content')
    {{--  Container  --}}
    <div class="grid grid-cols-1 gap-10 w-full max-w-7xl">
        <h1 class="text-3xl text-center text-accent font-bold">{{ $contest->name }}</h1>
        <div class="card rounded-lg shadow-md data">
            {{--  Header  --}}
            <div class="flex items-center text-xl text-slate-200 bg-slate-800 p-5 font-medium rounded-t-lg gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <h1 class="">
                    Submition
                </h1>
            </div>

            {{--  Form  --}}
            <div class="card-body bg-slate-600 rounded-b-lg">
                <div role="alert" class="alert rounded-md py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Silahkan masukkan link gdrive berupa file PDF.</span>
                </div>
                @if(session()->has('success'))
                    <div role="alert" class="alert alert-success rounded-md py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="">{{ session()->get('success') }}</span>
                    </div>
                @endif
                @error('link')
                <div role="alert" class="alert alert-error mb-3 rounded-md">
                    <div class="flex flex-row justify-start items-center gap-x-2 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span><strong>{{ $message }}</strong></span>
                    </div>
                </div>
                @enderror
                <form action="{{ route('team.contest.submit', $contest) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 mt-8 gap-2 lg:gap-12">
                    @csrf
                    <label class="form-control w-full lg:col-span-2">
                        <input type="text" placeholder="Link GDrive PDF" class="input input-bordered rounded-md w-full" name="link" />
                    </label>
                    <button type="submit" class="btn w-full rounded-md lg:col-span-1">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
