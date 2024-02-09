@extends('admin.layout.index', ['pageActive' => 'admin.messages', 'pageTitle' => 'Messages'])

@section('styles')
    <style>
        #previewChat {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 14rem;
        }

        .newChat {
            word-wrap: break-word;
            white-space: pre-wrap;
            max-width: 24rem;
        }

        @media (min-width: 1024px) {
            .newChat {
                max-width: 36rem;
            }
        }

        .dot {
            background-color: rgba(205, 255, 255, 0.7);
            border-radius: 50%;
            height: 7px;
            margin-right: 4px;
            vertical-align: middle;
            width: 7px;
            display: inline-block;
            animation: typingAnimation 1.8s infinite ease-in-out;
        }

        .dot:nth-child(1) {
            animation-delay: 200ms;
        }
        .dot:nth-child(2) {
            animation-delay: 300ms;
        }
        .dot:nth-child(3) {
            animation-delay: 400ms;
        }
        .dot:last-child {
            margin-right: 0;
        }

        @keyframes typingAnimation {
            0% {
                transform: translateY(0px);
                background-color: rgba(205, 255, 255, 0.7);
            }
            28% {
                transform: translateY(-7px);
                background-color: rgba(205, 255, 255, 0.4);
            }
            44% {
                transform: translateY(0px);
                background-color: rgba(205, 255, 255, 0.2);
            }
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
        <div class="p-3 flex flex-col gap-y-3 w-full border-b-2 border-b-gray-500 rounded-sm max-h-96 overflow-y-auto" id="chats">
            {{--  Chat  --}}
            @foreach($payload as $message => $status)
                @php($position = ($status['is_from_admin'] == 0 ? 'chat-start' : 'chat-end'))
                @php($isSeen = ($status['status'] == 0 ? 'Delivered' : 'Seen'))
                @php($by = ($status['is_from_admin']) ? $status['admin'] : $team['name'])
                <div class="chat {{ $position }}">
                    <div class="chat-header">
                        {{ $by }}
                        <time class="text-xs opacity-50">{{ $status['time'] }}</time>
                    </div>
                    <div class="chat-bubble max-w-sm lg:max-w-xl">{{ $message }}</div>
                    <div class="chat-footer opacity-50">{{ $isSeen }}</div>
                </div>
            @endforeach

            {{--   Typing Chat Animation   --}}
            <div class="chat chat-start" id="typing">
                <div class="chat-header">{{ $team['name'] }} <time class="text-xs opacity-50">now</time></div>
                <div class="chat-bubble">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
                <div class="chat-footer opacity-50">Typing...</div>
            </div>
        </div>

        <div class="flex w-full justify-between p-3">
            <input type="text" class="w-5/6 input input-bordered rounded-md" placeholder="Type something here to reply" id="msg">
            <button class="btn btn-primary w-1/12 rounded-md" id="sendReply" onclick="send()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Bikin chats scroll ke bawah
        let chats = document.getElementById('chats');
        chats.scrollTop = chats.scrollHeight;

        let team = "{{ $team['name'] }}"
        // Testing
        // setTimeout(() => {
        //     document.getElementById('typing').classList.remove('hidden');
        // }, 2000);

        const send = () => {
            let msg = document.getElementById('msg');
            let chats = document.getElementById('chats');
            let typingAnimation = document.getElementById('typing');

            // ==== PAKE AJAX LANGSUNG AJA ====
            $.ajax({
                url: '{{ route('admin.chat.send') }}',
                type: 'POST',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'team_name': team,
                    'msg': msg.value,
                },
                success: function (data) {
                    location.reload();
                },
                error: function (xhr) {
                    console.log(xhr);
                }

            })
            return;

            // Time
            let timestamp = Date.now();  // Dikirimkan ke ajax
            let date = new Date(timestamp);
            let hours = date.getHours();
            let minutes = date.getMinutes();

            // Convert hours to 12 format
            let ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12;  // handle midnight (0)

            // Add leading zero to minutes
            minutes = minutes < 10 ? '0' + minutes : minutes;
            let time = hours + ':' + minutes + ampm;

            let child = document.createElement('div');
            child.classList.add('chat', 'chat-end');

            let reply = `
                    <div class="chat-header">
                        admin
                    <time class="text-xs opacity-50">${time}</time>
                    </div>
                    <div class="chat-bubble max-w-sm lg:max-w-xl newChat">${msg.value}</div>
                    <div class="chat-footer opacity-50">Delivered</div>`;
            child.innerHTML = reply;

            chats.insertBefore(child, typingAnimation);

            // Clear input
            msg.value = '';
            msg.focus();
        }

        // Send by enter
        document.getElementById('msg').addEventListener('keypress', (e) => {
            if (e.keyCode === 13) {
                send();
            }
        })
    </script>
@endsection
