<?php

namespace App\Interfaces\Admin;

interface ChatRepositoryInterface {
    public function index();
    public function getChat(string $senderId);
}
