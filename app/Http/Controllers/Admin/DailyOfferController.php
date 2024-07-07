<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DailyOfferDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\DailyOfferRepositoryInterface;
use Illuminate\Http\Request;

class DailyOfferController extends Controller
{

    private $dailyOfferRepository;
    public function __construct(DailyOfferRepositoryInterface $dailyOfferRepository)
    {
        $this->dailyOfferRepository = $dailyOfferRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(DailyOfferDataTable $dataTable)
    {
        return $this->dailyOfferRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->dailyOfferRepository->create();
    }

    public function searchProduct(Request $request)
    {
        return $this->dailyOfferRepository->searchProduct($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->dailyOfferRepository->store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->dailyOfferRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->dailyOfferRepository->update($request,$id);
    }

    public function updateTitle(Request $request){
        return $this->dailyOfferRepository->updateTitle($request);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->dailyOfferRepository->destroy($id);
    }
}
