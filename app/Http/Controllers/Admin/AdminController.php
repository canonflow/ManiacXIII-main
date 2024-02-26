<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ParticipantsExport;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }

    public function messages() {
        $verifTeams = Team::where('status', 'verified')->pluck('id')->toArray();

        // Tampilin Message dari Tim yg sudah terverifikasi
        $messages = Message::whereIn('team_id', $verifTeams)->get();
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
        $team = Team::where('name', 'like', "%".$request->get('name')."%")
            ->where('status', 'verified')
            ->pluck('id')
            ->toArray();
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

    public function getChats(Team $team) {
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

        return $payload;
    }
    public function sendChat(Request $request) {
        $team = Team::where('name', $request->get('team_name'))->first();
        $messageRoom = Message::where('team_id', $team->id)->first();
        $newMsg = $request->get('msg');

        // Create Message
        Chat::create([
            'message' => $newMsg,
            'is_from_admin' => 1,
            'status' => 0,  // Asumsikan blm dibaca oleh Tim
            'admin_id' => 1,  // Sementara gini nanti ganti ke admin yg lagi login
            'message_id' => $messageRoom->id
        ]);
    }

    public function download() {
        //dd(storage_path('app/public/'));
        //dd(Storage::exists('public/test.png'));
        if (Storage::exists('public/test.png')) {
            return response()->download(storage_path('app/public/test.png'));
        }
    }

    public function export() {
        //return (new ParticipantsExport)->download('participants.xlsx');
        return Excel::download(new ParticipantsExport(), 'participants.xlsx')
                ->deleteFileAfterSend(true);
    }
}
