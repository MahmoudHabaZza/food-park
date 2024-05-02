<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductSizeRepositoryInterface;
use Illuminate\Http\Request;
use Response;

class ProductSizeController extends Controller
{
    //
    private $productSizeRepository;

    public function __construct(ProductSizeRepositoryInterface $productSizeRepository)
    {
        $this->productSizeRepository = $productSizeRepository;
    }

    public function index(string $id)
    {
        return $this->productSizeRepository->index($id);
    }

    public function store(Request $request)
    {
        return $this->productSizeRepository->store($request);
    }

    public function destroy(string $id)
    {
        return $this->productSizeRepository->destroy($id);
    }
}
