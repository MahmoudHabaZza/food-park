<?php

namespace App\Interfaces\Admin;

use App\DataTables\ReservationTimeDataTable;
use Illuminate\Http\Request;

interface ReservationTimeRepositoryInterface {
    public function index(ReservationTimeDataTable $dataTable);
    public function create();
    public function store(Request $request);
    public function edit(string $id);
    public function update(Request $request,string $id);
    public function destroy(string $id);
}
