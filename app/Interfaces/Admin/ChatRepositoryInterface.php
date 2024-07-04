<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface ChatRepositoryInterface {
    public function index();
    public function getChat(string $senderId);
    public function sendMessage(Request $request);
}
