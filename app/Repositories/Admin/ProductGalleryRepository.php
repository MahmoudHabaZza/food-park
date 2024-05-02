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
    public function index(string $id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.Product.Gallery.index',compact('id'));

    }
    public function create() : View
    {
        return view('Admin.Product.Gallery.create');
    }
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'image' => ['required','image','max:3000'],
            'product_id' => ['required','integer']
        ]);

        $image_path =  $this->uploadImage($request,'image','uploads/Admin/ProductImages');
        ProductGallery::create([
            'image' => $image_path,
            'product_id' => $request->product_id
        ]);

        toastr()->success('Created Successfully');
        return redirect()->back();
    }
}
