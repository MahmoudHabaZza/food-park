<?php
namespace App\Interfaces\Admin;

use App\DataTables\ReservationDataTable;

interface ReservationRepositoryInterface {
    public function index(ReservationDataTable $dataTable);
}
