<?php

namespace App\Repositories\Admin;

use App\DataTables\ProductRatingDataTable;
use App\Interfaces\Admin\ProductRatingRepositoryInterface;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingRepository implements ProductRatingRepositoryInterface {
    public function index(ProductRatingDataTable $dataTable)
    {
        return $dataTable->render('Admin.Product-Rating.index');
    }
    public function updateStatus(Request $request)
    {
        try {
            $reservation = ProductRating::findOrFail($request->id);
            $reservation->update([
                'status' => $request->status,
            ]);
            return response(['status' => 'success', 'message' => 'status Updated successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong']);
        }
    }
    public function destroy(string $id)
    {
        try {
            $reservation = ProductRating::findOrFail($id);
            $reservation->delete();
            return response(['status' => 'success', 'message' => 'Reservation Deleted successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong']);
        }
    }
}
