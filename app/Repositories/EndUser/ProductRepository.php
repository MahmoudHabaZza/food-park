<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRating;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProductRepository implements ProductRepositoryInterface {
    public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::with('category')->where('status', 1);


        if ($request->has('search') && $request->filled('search')) {
            $products->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('long_description', 'LIKE', '%' . $request->search . '%');
            });
        }
        if ($request->has('category') && $request->filled('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }
        $products = $products->withAvg('productRatings', 'rating')
            ->withCount('productRatings')
            ->orderByDesc('created_at')
            ->paginate(9);
        return view('EndUser.Pages.products', compact('products', 'categories'));
    }

    public function showProduct(string $slug): View
    {
        $product = Product::with(['images', 'sizes', 'options'])->where(['slug' => $slug, 'status' => 1])
            ->withAvg('productRatings', 'rating')
            ->withCount('productRatings')
            ->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(8)->latest()->get();

        $product_reviews = ProductRating::with('user')->where(['product_id' => $product->id, 'status' => 1])->orderBy('created_at', 'desc')->paginate(15);
        return view('EndUser.Pages.produc-view', compact('product', 'relatedProducts', 'product_reviews'));
    }
    public function loadProductModal($productId)
    {
        $product = Product::with(['sizes', 'options'])->findOrFail($productId);
        return view('EndUser.Pages.ajax-files.product-load-modal', compact('product'))->render();
        // render() => to ensure that we have html response
    }

    public function productReviewStore(Request $request)
    {
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review' => ['required', 'min:10', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        $user = Auth::user();

        if ($user) {
            $hasPurchased = $user->orders()
                ->where('order_status', 'delivered')
                ->whereHas('items', function ($query) use ($request) {
                    $query->where('product_id', $request->product_id);
                })
                ->exists();
        } else {
            $hasPurchased = false;
        }

        if (!$hasPurchased) {
            throw ValidationException::withMessages(['Your Must Buy This product to make a review']);
        }

        $alreadyReviewed = ProductRating::where(['user_id' => $user->id, 'product_id' => $request->product_id])->exists();
        if ($alreadyReviewed) {
            throw ValidationException::withMessages(['You Already Reviewed This Product']);
        }

        ProductRating::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review' => $request->review,
            'status' => 0
        ]);

        toastr()->success('Review Added Successfully and waiting to approved');
        return redirect()->back();
    }
}
