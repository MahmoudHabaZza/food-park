<?php

namespace App\Repositories\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Requests\Admin\DeliveryAreaCreateRequest;
use App\Interfaces\Admin\DeliveryAreaRepositoryInterface;
use App\Models\DeliveryArea;

class DeliveryAreaRepository implements DeliveryAreaRepositoryInterface {
    public function index(DeliveryAreaDataTable $dataTable)
    {
        return $dataTable->render('Admin.Delivery-Area.index');
    }
    public function create()
    {
        return view('Admin.Delivery-Area.create');
    }
    public function store(DeliveryAreaCreateRequest $request) {
        DeliveryArea::create([
            'area_name' => $request->area_name,
            'min_delivery_time' => $request->min_delivery_time,
            'max_delivery_time' => $request->max_delivery_time,
            'delivery_fee' => $request->delivery_fee,
            'status' => $request->status,
        ]);

        toastr()->success('Delivery Area Created Successfully');

        return to_route('admin.delivery-area.index');

    }
    public function edit(string $id)
    {
        $deliveryArea = DeliveryArea::findOrFail($id);
        return view('Admin.Delivery-Area.edit',compact('deliveryArea'));
    }
    public function update(DeliveryAreaCreateRequest $request, string $id)
    {
        $deliveryArea = DeliveryArea::findOrFail($id);

        $deliveryArea->update([
            'area_name' => $request->area_name,
            'min_delivery_time' => $request->min_delivery_time,
            'max_delivery_time' => $request->max_delivery_time,
            'delivery_fee' => $request->delivery_fee,
            'status' => $request->status,
        ]);

        toastr()->success('Delivery Area Updated Successfully');

        return to_route('admin.delivery-area.index');
    }

    public function destroy(string $id)
    {

        try {
            $deliveryArea = DeliveryArea::findOrFail($id);
            $deliveryArea->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'There is An Error']);
        }
    }
}
