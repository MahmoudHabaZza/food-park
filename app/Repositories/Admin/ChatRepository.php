<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ChatRepositoryInterface;

class ChatRepository implements ChatRepositoryInterface
{
    public function index()
    {
        return view('Admin.Chat.index');
    }
}
