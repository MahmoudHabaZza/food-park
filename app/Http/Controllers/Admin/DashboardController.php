<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderPlacedNotification;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() : View
    {
        $curUserId = auth()->user()->id;
        $chatUsers = User::where('id','!=',$curUserId)
            ->whereHas('chats',function($query) use($curUserId){
                $query->where(function($subQuery) use($curUserId){
                    $subQuery->where('sender_id',$curUserId)
                        ->orWhere('receiver_id',$curUserId);
                });
            })
            ->orderByDesc('created_at')
            ->distinct()
            ->get();
            dd($chatUsers);
        return view('Admin.Dashboard.index');
    }

    public function clearNotification(){
        try {
            OrderPlacedNotification::query()->update(['seen' => 1]);
            toastr()->success('Notification Cleared Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
