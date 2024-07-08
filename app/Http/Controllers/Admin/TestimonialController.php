<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialCreateRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Interfaces\Admin\TestimonialRepositoryInterface;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private $testimonialRepository;
    public function __construct(TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialDataTable $dataTable)
    {
        return $this->testimonialRepository->index($dataTable);
    }

    public function updateTitle(Request $request)
    {
        return $this->testimonialRepository->updateTitle($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return $this->testimonialRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialCreateRequest $request)
    {
        return $this->testimonialRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->testimonialRepository->edit($id);
    }

    public function update(TestimonialUpdateRequest $request, string $id)
    {
        return $this->testimonialRepository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->testimonialRepository->destroy($id);
    }
}
