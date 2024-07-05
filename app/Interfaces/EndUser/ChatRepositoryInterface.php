<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface ChatRepositoryInterface {
    public function sendMessage(Request $request);
    public function getChat(string $receiver_id);
}
