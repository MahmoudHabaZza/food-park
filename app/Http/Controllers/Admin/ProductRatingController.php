<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductRatingDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductRatingRepositoryInterface;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    private $productRatingRepository;
    public function __construct(ProductRatingRepositoryInterface $productRatingRepository)
    {
        $this->productRatingRepository = $productRatingRepository;
    }
    public function index(ProductRatingDataTable $dataTable)
    {
        return $this->productRatingRepository->index($dataTable);
    }
    public function updateStatus(Request $request)
    {
        return $this->productRatingRepository->updateStatus($request);
    }
    public function destroy(string $id)
    {
        return $this->productRatingRepository->destroy($id);
    }
}
