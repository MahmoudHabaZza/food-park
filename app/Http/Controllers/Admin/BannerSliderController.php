<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BannerSliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerSliderCreateRequest;
use App\Http\Requests\BannerSliderUpdateRequest;
use App\Interfaces\Admin\BannerSliderRepositoryInterface;
use Illuminate\Http\Request;

class BannerSliderController extends Controller
{
    private $bannerSliderRepository;
    public function __construct(BannerSliderRepositoryInterface $bannerSliderRepository)
    {
        $this->bannerSliderRepository = $bannerSliderRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BannerSliderDataTable $dataTable)
    {
        return $this->bannerSliderRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->bannerSliderRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerSliderCreateRequest $request)
    {
        return $this->bannerSliderRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->bannerSliderRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerSliderUpdateRequest $request, string $id)
    {
        return $this->bannerSliderRepository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->bannerSliderRepository->destroy($id);
    }
}
