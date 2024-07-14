<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReservationTimeDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ReservationTimeRepositoryInterface;
use Illuminate\Http\Request;

class ReservationTimeController extends Controller
{
    private $reservationTimeRepository;
    public function __construct(ReservationTimeRepositoryInterface $reservationTimeRepository)
    {
        $this->reservationTimeRepository = $reservationTimeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ReservationTimeDataTable $dataTable)
    {
        return $this->reservationTimeRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->reservationTimeRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->reservationTimeRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->reservationTimeRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->reservationTimeRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->reservationTimeRepository->destroy($id);
    }
}
