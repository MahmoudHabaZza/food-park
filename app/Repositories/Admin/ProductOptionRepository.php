<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ProductOptionRepositoryInterface;
use App\Models\ProductOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOptionRepository implements ProductOptionRepositoryInterface
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'numeric', 'max:5000'],
            'product_id' => ['required', 'integer'],
        ]);

        ProductOption::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_id' => $request->product_id,
        ]);

        toastr()->success('Product Option Added Successfully');
        return redirect()->back();
    }
    public function destroy(string $id): Response
    {
        try {
            $option = ProductOption::findOrFail($id);
            $option->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'There is An Error']);
        }
    }
}
