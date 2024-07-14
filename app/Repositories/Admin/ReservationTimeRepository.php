<?php

namespace App\Repositories\Admin;

use App\DataTables\ReservationTimeDataTable;
use App\Interfaces\Admin\ReservationTimeRepositoryInterface;
use App\Models\ReservationTime;
use Illuminate\Http\Request;

class ReservationTimeRepository implements ReservationTimeRepositoryInterface {
    public function index(ReservationTimeDataTable $dataTable)
    {
        return $dataTable->render('Admin.Reservation.Time.index');
    }
    public function create()
    {
        return view('Admin.Reservation.Time.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required','boolean'],
        ]);

        ReservationTime::create([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
           'status' => $request->status,
        ]);

        toastr()->success('Reservation Time Created Successfully');
        return to_route('admin.reservation-times.index');
    }
    public function edit(string $id)
    {
        $time = ReservationTime::findOrFail($id);
        return view('Admin.Reservation.Time.edit',compact('time'));
    }
    public function update(Request $request, string $id)
    {
        $time = ReservationTime::findOrFail($id);
        $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required', 'boolean'],
        ]);
        $time->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
           'status' => $request->status,
        ]);

        toastr()->success('Reservation Time updated successfully');
        return to_route('admin.reservation-times.index');

    }
    public function destroy(string $id)
    {
        try {
            $time = ReservationTime::findOrFail($id);
            $time->delete();
            return response(['status' => 'success', 'message' => 'Blog has been deleted']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'There is an error']);
        }
    }
}
