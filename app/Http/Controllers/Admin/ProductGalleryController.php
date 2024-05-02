<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductGalleryRepositoryInterface;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{

    private $productGalleryRepository;
    public function __construct(ProductGalleryRepositoryInterface $productGalleryRepository)
    {
        $this->productGalleryRepository = $productGalleryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $product_id)
    {
        return $this->productGalleryRepository->index($product_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->productGalleryRepository->store($request);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->productGalleryRepository->destroy($id);
    }
}
