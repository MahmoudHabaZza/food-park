<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminManagementDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminManagementRepository;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    private $adminManagementRepository;
    public function __construct(AdminManagementRepository $adminManagementRepository)
    {
        $this->adminManagementRepository = $adminManagementRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(AdminManagementDataTable $dataTable)
    {
        return $this->adminManagementRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->adminManagementRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->adminManagementRepository->store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->adminManagementRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->adminManagementRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->adminManagementRepository->destroy($id);
    }
}
