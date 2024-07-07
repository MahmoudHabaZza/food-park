<?php

namespace App\Repositories\Admin;

use App\Events\ChatEvent;
use App\Interfaces\Admin\ChatRepositoryInterface;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatRepository implements ChatRepositoryInterface
{
    public function index()
    {
        $curUserId = auth()->user()->id;
        $senders = Chat::select('sender_id')
            ->where('receiver_id',$curUserId)
            ->where('sender_id','!=',$curUserId)
            ->selectRaw('MAX(created_at) as latest_message_sent')
            ->groupBy('sender_id')
            ->orderByDesc('latest_message_sent')
            ->get();



        return view('Admin.Chat.index' , compact('senders'));
    }
    public function getChat(string $senderId)
    {
        $receiver_id = auth()->user()->id;
        $chats = Chat::whereIn('sender_id',[$senderId,$receiver_id])
            ->whereIn('receiver_id',[$senderId,$receiver_id])
            ->with('sender')
            ->orderBy('created_at','asc')
            ->get();
        Chat::where('sender_id',$senderId)->where('receiver_id',$receiver_id)->where('seen',0)->update(['seen' => 1]);
        return response($chats);
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => ['required', 'max:1000'],
            'receiver_id' => ['required', 'integer']
        ]);

        Chat::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        $avatar = asset(auth()->user()->avatar);
        $senderId = auth()->user()->id;
        broadcast(new ChatEvent($request->message,$avatar, $request->receiver_id,$senderId))->toOthers();

        return response(['status' => 'success']);
    }
}
