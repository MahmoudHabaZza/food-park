<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\BlogCategoryRepositoryInterface;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    private $blogCategoryRepository;
    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $this->blogCategoryRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->blogCategoryRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->blogCategoryRepository->store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->blogCategoryRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->blogCategoryRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->blogCategoryRepository->destroy($id);
    }
}
