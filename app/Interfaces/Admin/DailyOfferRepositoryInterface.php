<?php

namespace App\Interfaces\Admin;

use App\DataTables\DailyOfferDataTable;
use Illuminate\Http\Request;

interface DailyOfferRepositoryInterface {
    public function index(DailyOfferDataTable $dataTable);
    public function create();
    public function searchProduct(Request $request);
    public function store(Request $request);
    public function edit(string $id);
    public function update(Request $request , string $id);
    public function updateTitle(Request $request);
    public function destroy(string $id);
}
