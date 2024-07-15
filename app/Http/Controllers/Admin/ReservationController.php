<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReservationDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ReservationRepositoryInterface;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private $reservationRepository;
    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }
    public function index(ReservationDataTable $dataTable)
    {
        return $this->reservationRepository->index($dataTable);
    }
}
