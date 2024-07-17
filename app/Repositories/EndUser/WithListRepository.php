<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\WithListRepositoryInterface;
use App\Models\WishList;
use Auth;
use Illuminate\Validation\ValidationException;

class WithListRepository implements WithListRepositoryInterface
{
    public function store(string $productId)
    {
        if (!Auth::check()) {
            throw ValidationException::withMessages(['Please Log in To Add this product to wishlist']);
        }
        $hasAlreadyAdded = WishList::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->exists();
        if ($hasAlreadyAdded) {
            throw ValidationException::withMessages(['You Already Added This Product to Wishlist']);
        }

        WishList::create([
            'user_id' => auth()->user()->id,
            'product_id' => $productId,
        ]);

        return response(['status'=> 'success','message' => 'product Added To wishlist successfully']);
    }
}
