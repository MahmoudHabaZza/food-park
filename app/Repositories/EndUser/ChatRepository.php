<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\ChatRepositoryInterface;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatRepository implements ChatRepositoryInterface
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => ['required','max:1000'],
            'receiver_id' => ['required','integer']
        ]);

        Chat::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response(['status' => 'success']);
    }
    public function getChat(string $receiverId)
    {
        $sender_id = auth()->user()->id;
        $chats = Chat::whereIn('sender_id', [$sender_id, $receiverId])
            ->whereIn('receiver_id', [$sender_id, $receiverId])
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();
        return response($chats);
    }
}
