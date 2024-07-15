<?php
namespace App\Repositories\Admin;

use App\DataTables\ReservationDataTable;
use App\Interfaces\Admin\ReservationRepositoryInterface;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationRepository implements ReservationRepositoryInterface {
    public function index(ReservationDataTable $dataTable)
    {
        return $dataTable->render('Admin.Reservation.index');
    }
    public function updateStatus(Request $request)
    {
        try{
            $reservation = Reservation::findOrFail($request->id);
            $reservation->update([
                'status' => $request->status,
            ]);
            return response(['status'=> 'success','message'=> 'status Updated successfully']);
        }catch(\Exception $e){
            return response(['status' => 'error','message' => 'Something Went Wrong']);
        }
    }
    public function destroy(string $id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->delete();
            return response(['status' => 'success','message' => 'Reservation Deleted successfully']);
        }catch (\Exception $e){
            return response(['status' => 'error','message' => 'Something Went Wrong']);
        }

    }
}
