<?php

namespace App\Interfaces\Admin;

use App\DataTables\ProductRatingDataTable;
use Illuminate\Http\Request;

interface ProductRatingRepositoryInterface {
    public function index(ProductRatingDataTable $dataTable);
    public function updateStatus(Request $request);
    public function destroy(string $id);
}
