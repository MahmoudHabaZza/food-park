<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ChatRepositoryInterface;
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
            ->get();
        return view('Admin.Chat.index' , compact('chatUsers'));
    }
}
