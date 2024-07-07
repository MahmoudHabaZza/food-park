<?php

namespace App\Interfaces\Admin;

use App\DataTables\DailyOfferDataTable;
use Illuminate\Http\Request;

interface DailyOfferRepositoryInterface {
    public function index(DailyOfferDataTable $dataTable);
    public function create();
    public function searchProduct(Request $request);
}
