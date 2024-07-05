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
        $chatUsers = User::where('id', '!=', $curUserId)
            ->whereHas('chats', function ($query) use ($curUserId) {
                $query->where(function ($subQuery) use ($curUserId) {
                    $subQuery->where('sender_id', $curUserId)
                        ->orWhere('receiver_id', $curUserId);
                });
            })
            ->orderByDesc('created_at')
            ->distinct()
            ->get()
            ->sortByDesc(function ($user) {
                return $user->chats->first()->created_at ?? now()->subYear();
            });
        return view('Admin.Chat.index' , compact('chatUsers'));
    }
    public function getChat(string $senderId)
    {
        $receiver_id = auth()->user()->id;
        $chats = Chat::whereIn('sender_id',[$senderId,$receiver_id])
            ->whereIn('receiver_id',[$senderId,$receiver_id])
            ->with('sender')
            ->orderBy('created_at','asc')
            ->get();
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

        broadcast(new ChatEvent($request->message, $request->receiver_id))->toOthers();

        return response(['status' => 'success']);
    }
}
