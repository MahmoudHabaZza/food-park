<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }
    public function index(Request $request)
    {
        return $this->product->index($request);
    }

    public function showProduct(string $slug)
    {
        return $this->product->showProduct($slug);
    }

    public function loadProductModal($productId)
    {
        return $this->product->loadProductModal($productId);
    }

    public function productReviewStore(Request $request)
    {
        return $this->product->productReviewStore($request);
    }
}
