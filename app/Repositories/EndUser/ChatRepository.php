<?php

namespace App\Repositories\EndUser;

use App\Events\ChatEvent;
use App\Interfaces\EndUser\ChatRepositoryInterface;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatRepository implements ChatRepositoryInterface
{
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

        return response(['status' => 'success','msg_temp_id' => $request->msg_temp_id]);
    }
    public function getChat(string $receiverId)
    {
        $sender_id = auth()->user()->id;
        $chats = Chat::whereIn('sender_id', [$sender_id, $receiverId])
            ->whereIn('receiver_id', [$sender_id, $receiverId])
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();
        Chat::where(['sender_id' => 1 , 'receiver_id' => auth()->user()->id,'seen' => 0])->update(['seen' => 1]);
        return response($chats);
    }
}
