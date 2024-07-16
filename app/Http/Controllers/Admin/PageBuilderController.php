<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PageBuilderDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\PageBuilderRepositoryInterface;
use Illuminate\Http\Request;

class PageBuilderController extends Controller
{
    private $pageBuilderRepository;
    public function __construct(PageBuilderRepositoryInterface $pageBuilderRepository)
    {
        $this->pageBuilderRepository = $pageBuilderRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(PageBuilderDataTable $dataTable)
    {
        return $this->pageBuilderRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->pageBuilderRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->pageBuilderRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->pageBuilderRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->pageBuilderRepository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->pageBuilderRepository->destroy($id);
    }
}
