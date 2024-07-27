<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\WithListRepositoryInterface;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    private $wishListRepository;
    public function __construct(WithListRepositoryInterface $wishListRepository)
    {
        $this->wishListRepository = $wishListRepository;
    }
    public function store(string $productId)
    {
        return $this->wishListRepository->store($productId);
    }
    public function destroy(string $id)
    {
        return $this->wishListRepository->destroy($id);
    }
}
