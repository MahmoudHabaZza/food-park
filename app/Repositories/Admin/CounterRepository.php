<?php

namespace App\Repositories\Admin;

use App\Http\Requests\CounterUpdateRequest;
use App\Interfaces\Admin\CounterRepositoryInterface;
use App\Models\Counter;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;

class CounterRepository implements CounterRepositoryInterface {
    use UploadFileTrait;
    public function index()
    {
        $counter = Counter::first();
        return view('Admin.Counter.index',compact('counter'));
    }
    public function update(CounterUpdateRequest $request)
    {

        $imagePath = $this->uploadImage($request,'background','uploads',$request->old_background);

        Counter::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($imagePath)? $imagePath : $request->old_background,
                'counter_icon_one' => $request->counter_icon_one,
                'counter_name_one' => $request->counter_name_one,
                'counter_count_one' => $request->counter_count_one,

                'counter_icon_two' => $request->counter_icon_two,
                'counter_name_two' => $request->counter_name_two,
                'counter_count_two' => $request->counter_count_two,

                'counter_icon_three' => $request->counter_icon_three,
                'counter_name_three' => $request->counter_name_three,
                'counter_count_three' => $request->counter_count_three,

                'counter_icon_four' => $request->counter_icon_four,
                'counter_name_four' => $request->counter_name_four,
                'counter_count_four' => $request->counter_count_four,
            ]
        );

        toastr()->success('Counter Updated Successfully');
        return to_route('admin.counter.index');
    }
}
