<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface ProductGalleryRepositoryInterface
{
    public function index(string $id);
    public function create();
    public function store(Request $request);
}
