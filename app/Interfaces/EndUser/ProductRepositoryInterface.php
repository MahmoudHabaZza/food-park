<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface ProductRepositoryInterface {
    public function index(Request $request);
    public function showProduct(string $slug);
    public function loadProductModal($productId);
    public function productReviewStore(Request $request);
}
