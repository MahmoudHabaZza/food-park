<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface ProductGalleryRepositoryInterface
{
    public function index(string $product_id);
    public function store(Request $request);
    public function destroy(string $id);
}
