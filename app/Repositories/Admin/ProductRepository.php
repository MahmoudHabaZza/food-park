<?php

namespace App\Repositories\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Interfaces\Admin\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadFileTrait;
use Illuminate\View\View;

class ProductRepository implements ProductRepositoryInterface
{

    use UploadFileTrait;
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
        $image_path = $this->uploadImage($request, 'thumb_image', 'uploads/Admin/ProductImages');
        Product::create([
            'thumb_image' => $image_path,
            'name' => $request->name,
            'slug' => generateUniqueSlug('Product', $request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'offer_price' => $request->offer_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sku' => $request->sku,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'status' => $request->status,
            'show_at_home' => $request->show_at_home,

        ]);

        toastr()->success('Product Created Successfully');
        return to_route('admin.product.index');
    }
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('admin.Product.edit', compact('product','categories'));
    }
}
