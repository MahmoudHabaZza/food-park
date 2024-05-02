<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface ProductSizeRepositoryInterface
{
    public function index(string $id);
    public function store(Request $request);
    public function destroy(string $id);
}
