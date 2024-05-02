<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductOptionRepositoryInterface;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    //

    private $productOptionRepository;
    public function __construct(ProductOptionRepositoryInterface $productOptionRepository)
    {
        $this->productOptionRepository = $productOptionRepository;
    }

    public function store(Request $request)
    {
        return $this->productOptionRepository->store($request);
    }

    public function destroy(string $id)
    {
        return $this->productOptionRepository->destroy($id);
    }
}
