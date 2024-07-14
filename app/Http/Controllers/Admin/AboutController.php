<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUpdateRequest;
use App\Interfaces\Admin\AboutRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutRepository;
    public function __construct(AboutRepositoryInterface $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }
    public function index()
    {
        return $this->aboutRepository->index();
    }
    public function update(AboutUpdateRequest $request)
    {
        return $this->aboutRepository->update($request);
    }
}
