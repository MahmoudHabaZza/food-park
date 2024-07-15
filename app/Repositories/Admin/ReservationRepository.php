<?php
namespace App\Repositories\Admin;

use App\DataTables\ReservationDataTable;
use App\Interfaces\Admin\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface {
    public function index(ReservationDataTable $dataTable)
    {
        return $dataTable->render('Admin.Reservation.index');
    }
}
