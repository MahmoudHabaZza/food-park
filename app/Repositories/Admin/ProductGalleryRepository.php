<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ProductGalleryRepositoryInterface;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Traits\UploadFileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductGalleryRepository implements ProductGalleryRepositoryInterface
{
    use UploadFileTrait;
    public function index(string $product_id): View
    {
        $product = Product::findOrFail($product_id);
        $images = ProductGallery::where('product_id', $product_id)->get();
        return view('Admin.Product.Gallery.index', compact('product', 'images'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'product_id' => ['required', 'integer']
        ]);

        $image_path =  $this->uploadImage($request, 'image', 'uploads');
        ProductGallery::create([
            'image' => $image_path,
            'product_id' => $request->product_id
        ]);

        toastr()->success('Created Successfully');
        return redirect()->back();
    }
    public function destroy(string $id)
    {

        try {
            $image = ProductGallery::findOrFail($id);
            $this->removeImage($image->image);
            $image->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'There is An Error']);
        }
    }
}
