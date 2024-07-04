<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\ChatRepositoryInterface;
use Illuminate\Http\Request;

class ChatRepository implements ChatRepositoryInterface
{
    public function sendMessage(Request $request)
    {
        dd($request->all());
    }
}
