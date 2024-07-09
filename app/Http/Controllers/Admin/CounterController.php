<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CounterUpdateRequest;
use App\Interfaces\Admin\CounterRepositoryInterface;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    private $counterRepository;
    public function __construct(CounterRepositoryInterface $counterRepository)
    {
        $this->counterRepository = $counterRepository;
    }
    public function index()
    {
        return $this->counterRepository->index();
    }
    public function update(CounterUpdateRequest $request)
    {
        return $this->counterRepository->update($request);
    }
}
