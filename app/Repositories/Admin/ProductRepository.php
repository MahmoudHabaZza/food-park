<?php

namespace App\Repositories\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Interfaces\Admin\ProductRepositoryInterface;
use App\Models\Category;
use Illuminate\View\View;

class ProductRepository implements ProductRepositoryInterface
{
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.Product.index');
    }

    public function create(): View
    {
        $categories = Category::get();
        return view('Admin.Product.create', compact('categories'));
    }
    public function store(ProductCreateRequest $request)
    {
    }
}
