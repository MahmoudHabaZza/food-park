<?php
namespace App\Interfaces\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Requests\Admin\DeliveryAreaCreateRequest;

interface DeliveryAreaRepositoryInterface {
    public function index(DeliveryAreaDataTable $dataTable);
    public function create();
    public function store(DeliveryAreaCreateRequest $request);
    public function edit(string $id);
    public function update(DeliveryAreaCreateRequest $request, string $id);
    public function destroy(string $id);
}
