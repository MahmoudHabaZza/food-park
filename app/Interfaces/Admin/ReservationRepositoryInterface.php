<?php
namespace App\Interfaces\Admin;

use App\DataTables\ReservationDataTable;
use Illuminate\Http\Request;

interface ReservationRepositoryInterface {
    public function index(ReservationDataTable $dataTable);
    public function updateStatus(Request $request);
    public function destroy(string $id);
}
