<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterInfoUpdateRequest;
use App\Interfaces\Admin\FooterInfoRepositoryInterface;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    private $footerRepository;
    public function __construct(FooterInfoRepositoryInterface $footerRepository)
    {
        $this->footerRepository = $footerRepository;
    }
    public function index(){
        return $this->footerRepository->index();
    }
    public function update(FooterInfoUpdateRequest $request)
    {
        return $this->footerRepository->update($request);
    }
}
