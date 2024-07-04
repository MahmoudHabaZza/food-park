<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ChatRepositoryInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $chatRepository;
    public function __construct(ChatRepositoryInterface $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }
    public function index()
    {
        return $this->chatRepository->index();
    }
}
