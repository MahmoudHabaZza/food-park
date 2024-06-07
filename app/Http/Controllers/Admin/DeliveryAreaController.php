<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryAreaCreateRequest;
use App\Interfaces\Admin\DeliveryAreaRepositoryInterface;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{

    private $deliveryAreaRepository;
    public function __construct(DeliveryAreaRepositoryInterface $deliveryAreaRepository)
    {
        $this->deliveryAreaRepository = $deliveryAreaRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DeliveryAreaDataTable $dataTable)
    {
        return $this->deliveryAreaRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->deliveryAreaRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryAreaCreateRequest $request)
    {
        return $this->deliveryAreaRepository->store($request);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->deliveryAreaRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryAreaCreateRequest $request, string $id)
    {
        return $this->deliveryAreaRepository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->deliveryAreaRepository->destroy($id);
    }
}
