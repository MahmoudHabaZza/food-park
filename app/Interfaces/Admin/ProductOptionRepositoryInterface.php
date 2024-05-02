<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface ProductOptionRepositoryInterface
{
    public function store(Request $request);
    public function destroy(string $id);
}
