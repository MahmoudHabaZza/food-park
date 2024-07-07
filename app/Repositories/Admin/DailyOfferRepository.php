<?php

namespace App\Repositories\Admin;

use App\DataTables\DailyOfferDataTable;
use App\Interfaces\Admin\DailyOfferRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DailyOfferRepository implements DailyOfferRepositoryInterface {
    public function index(DailyOfferDataTable $dataTable)
    {
        return $dataTable->render('Admin.Daily-Offer.index');
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
}
