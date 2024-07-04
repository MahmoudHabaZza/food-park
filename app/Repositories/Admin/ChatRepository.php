<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ChatRepositoryInterface;
use App\Models\Chat;
use App\Models\User;

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
            ->orderBy('created_at','asc')
            ->get();
        return response($chats);
    }
}
