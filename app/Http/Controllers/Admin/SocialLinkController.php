<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkCreateRequest;
use App\Interfaces\Admin\SocialLinkRepositoryInterface;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    private $socialLinkRepository;
    public function __construct(SocialLinkRepositoryInterface $socialLinkRepository)
    {
        $this->socialLinkRepository = $socialLinkRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(SocialLinkDataTable $dataTable)
    {
        return $this->socialLinkRepository->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->socialLinkRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialLinkCreateRequest $request)
    {
        return $this->socialLinkRepository->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->socialLinkRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkCreateRequest $request, string $id)
    {
        return $this->socialLinkRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->socialLinkRepository->destroy($id);
    }
}
