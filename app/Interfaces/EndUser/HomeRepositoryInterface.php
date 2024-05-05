<?php

namespace App\Interfaces\EndUser;

interface HomeRepositoryInterface
{
    public function index();
    public function showProduct(string $slug);
    public function loadProductModal($productId);
}
