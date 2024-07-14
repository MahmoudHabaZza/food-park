<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUpdateRequest;
use App\Interfaces\Admin\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function index()
    {
        return $this->contactRepository->index();
    }
    public function update(ContactUpdateRequest $request)
    {
        return $this->contactRepository->update($request);
    }
}
