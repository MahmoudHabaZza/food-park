<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\HomeRepositoryInterface;

class HomeController extends Controller
{
    //


    private $homeRepository;
    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index()
    {
        return $this->homeRepository->index();
    }

    public function showProduct(string $slug)
    {
        return $this->homeRepository->showProduct($slug);
    }

    public function loadProductModal($productId)
    {
        return $this->homeRepository->loadProductModal($productId);
    }
}
