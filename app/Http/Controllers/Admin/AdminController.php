<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }

    public function messages() {
        $messages = Message::all();
        $payload = [];

        foreach ($messages as $message) {
            $latestChat = Chat::where('message_id', $message->id)
                ->orderBy('created_at', 'DESC')
                ->first();
            $payload += [
                $message->team->name => [
                    'chat' => ($latestChat == null) ? 'New here' : $latestChat->message,
                    'status' => $latestChat->status ?? 1
                ]
            ];
        }
        return view('admin.messages.index', compact("payload"));
    }

    public function searchMessage(Request $request) {
        $team = Team::where('name', 'like', "%".$request->get('name')."%")->pluck('id')->toArray();
        $messages = Message::whereIn('team_id', $team)->get();
        //dd($messages[0]->team_id);
        $payload = [];

        foreach ($messages as $message) {
            $latestChat = Chat::where('message_id', $message->id)
                ->orderBy('created_at', 'DESC')
                ->first();
            $payload += [
                $message->team->name => [
                    'chat' => ($latestChat == null) ? 'New here' : $latestChat->message,
                    'status' => $latestChat->status ?? 1
                ]
            ];
        }
        return view('admin.messages.index', compact("payload"));
    }

    public function showChat(Request $request, Team $team) {
        /* Timestamp from database to readable time like from 2024-02-08 20:22:02 to 8:22pm
            1. Get Time from db (in string)
               $dateString = "".$chat->created_at
            2. Convert to php timestamp
               $timestamp = strtotime($dateString);
            3. Convert to readable
               $time = date("g:ia", $timestamp);
        */
        // Jangan LIMIT 10 -> tampilkan pesan yg dikirimkan hari ini saja (opsional)
        $chats = Chat::where('message_id', $team->message->id)
                    ->orderBy('created_at', 'ASC')
                    ->get();
        $payload = [];
        foreach ($chats as $chat) {
            $temp = [
                $chat->message => [
                    'is_from_admin' => $chat->is_from_admin,
                    'status' => $chat->status,
                    'admin' => ($chat->is_from_admin == 1) ? $chat->admin->name : '',
                    'time' => date("g:ia", strtotime("".$chat->created_at))
                ]
            ];
            $payload += $temp;
        }
        //dd($payload);
        return view('admin.chat.index', compact('team', 'payload'));
    }
}
