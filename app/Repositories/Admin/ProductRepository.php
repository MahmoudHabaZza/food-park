<?php

namespace App\Repositories\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Interfaces\Admin\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadFileTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductRepository implements ProductRepositoryInterface
{

    use UploadFileTrait;
    public function index(ProductDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.Product.index');
    }

    public function create(): View
    {
        $categories = Category::get();
        return view('Admin.Product.create', compact('categories'));
    }
    public function store(ProductCreateRequest $request): RedirectResponse
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
        return view('admin.Product.edit', compact('product', 'categories'));
    }
    public function update(ProductUpdateRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $image_path = $this->uploadImage($request, 'thumb_image', 'uploads/Admin/ProductImages', $product->thumb_image);

        $product->update([
            'thumb_image' => !(empty($image_path)) ? $image_path : $product->thumb_image,
            'name' => $request->name,
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
        toastr()->success('Product Updated  Successfully');
        return to_route('admin.product.index');
    }
    public function destroy(string $id): Response
    {
        $product = Product::findOrFail($id);

        try {
            $this->removeImage($product->thumb_image);
            $product->delete();
            return response(['status' => 'success', 'message' => 'Product Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
