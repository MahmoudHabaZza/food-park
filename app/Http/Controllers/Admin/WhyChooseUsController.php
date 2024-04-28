<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WhyChooseUsCreateRequest;
use App\Interfaces\Admin\WhyChooseUsRepositoryInterface;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{

    private $why_choose_us;
    public function __construct(WhyChooseUsRepositoryInterface $why_choose_us)
    {
        $this->why_choose_us = $why_choose_us;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(WhyChooseUsDataTable $datatable)
    {
        return $this->why_choose_us->index($datatable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->why_choose_us->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsCreateRequest $request)
    {
        return $this->why_choose_us->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->why_choose_us->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhyChooseUsCreateRequest $request, string $id)
    {
        return $this->why_choose_us->update($request, $id);
    }
    public function updateTitle(Request $request)
    {
        return $this->why_choose_us->updateTitle($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->why_choose_us->destroy($id);
    }
}
