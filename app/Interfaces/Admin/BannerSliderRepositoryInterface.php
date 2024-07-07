<?php

namespace App\Interfaces\Admin;

use App\DataTables\BannerSliderDataTable;
use App\Http\Requests\BannerSliderCreateRequest;
use App\Http\Requests\BannerSliderUpdateRequest;

interface BannerSliderRepositoryInterface {
    public function index(BannerSliderDataTable $dataTable);
    public function create();
    public function store(BannerSliderCreateRequest $request);
    public function edit(string $id);
    public function update(BannerSliderUpdateRequest $request,string $id);
    public function destroy(string $id);
}
