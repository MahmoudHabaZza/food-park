<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponCreateRequest;
use App\Http\Requests\Admin\CouponUpdateRequest;
use App\Interfaces\Admin\CouponRepositoryInterface;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    private $couponRepository;
    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $this->couponRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->couponRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponCreateRequest $request)
    {
        return $this->couponRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->couponRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponUpdateRequest $request , string $id)
    {
        return $this->couponRepository->update($request , $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->couponRepository->destroy($id);
    }
}
