@extends('admin.layout.index', ['pageActive' => 'admin.messages', 'pageTitle' => 'Messages'])

@section('styles')
    <style>
        #previewChat {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 14rem;
        }
    </style>
@endsection

@section('content')
    <div class="text-sm breadcrumbs gap-1 flex items-center">
        <h1 class="text-xl font-semibold">Admin</h1>
        <div class="divider divider-horizontal mx-0"></div>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.messages') }}">Messages</a></li>
            <li><a href="{{ route('admin.chat', $team['name']) }}" class="text-secondary font-medium">{{ $team['name'] }}</a></li>
        </ul>
    </div>
    {{-- Message --}}
    <div class="flex flex-col justify-center content-center w-full">
        {{--    Header    --}}
        <div class="p-3 w-full border-b-2 border-b-gray-500 rounded-sm">
            <div class="flex gap-5 items-center">
                {{-- Profile --}}
                <div class="avatar">
                    <div class="w-14 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <div class="flex flex-col gap-0">
                    <p class="text-white font-medium text-md">{{ $team['name'] }}</p>
                    <p class="text-sm">Reply to message</p>
                </div>
            </div>
        </div>

        {{--  Chats  --}}
        <div class="p-3 flex flex-col gap-y-3 w-full border-b-2 border-b-gray-500 rounded-sm max-h-96 overflow-y-auto">
            {{--  Chat  --}}
            @foreach($payload as $message => $status)
                @php($position = ($status['is_from_admin'] == 0 ? 'chat-start' : 'chat-end'))
                @php($isSeen = ($status['status'] == 0 ? 'Delivered' : 'Seen'))
                <div class="chat {{ $position }}">
                    <div class="chat-header">
                        {{ $team['name'] }}
                        <time class="text-xs opacity-50">{{ $status['time'] }}</time>
                    </div>
                    <div class="chat-bubble max-w-sm lg:max-w-xl">{{ $message }}</div>
                    <div class="chat-footer opacity-50">{{ $isSeen }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')

@endsection
