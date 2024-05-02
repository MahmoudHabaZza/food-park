<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ProductSizeRepositoryInterface;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductSizeRepository implements ProductSizeRepositoryInterface
{
    public function index(string $id): View
    {
        $product = Product::findOrFail($id);
        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();
        return view('Admin.Product.Product-Size.index', compact('product', 'sizes', 'options'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'numeric', 'max:5000'],
            'product_id' => ['required', 'integer'],
        ]);

        ProductSize::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_id' => $request->product_id,
        ]);

        toastr()->success('Product Size Added Successfully');
        return redirect()->back();
    }
    public function destroy(string $id): Response
    {
        try {
            $size = ProductSize::findOrFail($id);
            $size->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'There is An Error']);
        }
    }
}
