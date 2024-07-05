<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\ChatRepositoryInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $chatRepository;
    public function __construct(ChatRepositoryInterface $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }
    public function sendMessage(Request $request){
        return $this->chatRepository->sendMessage($request);
    }
    public function getChat(string $senderId)
    {
        return $this->chatRepository->getChat($senderId);
    }
}
