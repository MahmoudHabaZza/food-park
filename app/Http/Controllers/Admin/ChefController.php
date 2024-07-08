<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ChefDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChefCreateRequest;
use App\Http\Requests\ChefUpdateRequest;
use App\Interfaces\Admin\ChefRepositoryInterface;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    private $chefRepository;
    public function __construct(ChefRepositoryInterface $chefRepository)
    {
        $this->chefRepository = $chefRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ChefDataTable $dataTable)
    {
        return $this->chefRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->chefRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefCreateRequest $request)
    {
        return $this->chefRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->chefRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChefUpdateRequest $request, string $id)
    {
        return $this->chefRepository->update($request,$id);
    }

    public function updateTitle(Request $request){
        return $this->chefRepository->updateTitle($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->chefRepository->destroy($id);
    }
}
