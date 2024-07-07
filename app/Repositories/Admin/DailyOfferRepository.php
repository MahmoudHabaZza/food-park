<?php

namespace App\Repositories\Admin;

use App\DataTables\DailyOfferDataTable;
use App\Interfaces\Admin\DailyOfferRepositoryInterface;
use App\Models\DailyOffer;
use App\Models\Product;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DailyOfferRepository implements DailyOfferRepositoryInterface {
    public function index(DailyOfferDataTable $dataTable)
    {
        $keys = ['daily_offer_top_title', 'daily_offer_main_title', 'daily_offer_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('Admin.Daily-Offer.index',compact('titles'));
    }
    public function create()
    {
        return view('Admin.Daily-Offer.create');
    }
    public function searchProduct(Request $request) : Response
    {
        $product = Product::select('id','name','thumb_image')->where('name','LIKE','%'.$request->search.'%')->get();
        return response($product);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product' => ['required','integer'],
            'status' => ['required','boolean']
        ]);

        DailyOffer::create([
            'product_id' => $request->product,
            'status' => $request->status
        ]);

        toastr()->success('Daily Offer Created Successfully');
        return to_route('admin.daily-offer.index');
    }
    public function edit(string $id){
        $dailyOffer = DailyOffer::with('product')->findOrFail($id);
        return view('Admin.Daily-Offer.edit',compact('dailyOffer'));
    }
    public function update(Request $request, string $id)
    {
        $dailyOffer = DailyOffer::findOrFail($id);
        $dailyOffer->update([
            'product_id' => $request->product,
            'status' => $request->status
        ]);

        toastr()->success('Daily Offer Updated Successfully');
        return to_route('admin.daily-offer.index');
    }

    public function updateTitle(Request $request)
    {
        $request->validate([
            'daily_offer_top_title' => ['required', 'max:100'],
            'daily_offer_main_title' => ['required', 'max:200'],
            'daily_offer_sub_title' => ['required', 'max:500'],
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'daily_offer_top_title'],
            ['value' => $request->daily_offer_top_title],
        );
        SectionTitle::updateOrCreate(
            ['key' => 'daily_offer_main_title'],
            ['value' => $request->daily_offer_main_title],

        );
        SectionTitle::updateOrCreate(
            ['key' => 'daily_offer_sub_title'],
            ['value' => $request->daily_offer_sub_title],

        );
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $dailyOffer = DailyOffer::findOrFail($id);

        try {
            $dailyOffer->delete();
            return response(['status' => 'success', 'message' => 'Daily Offer Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
