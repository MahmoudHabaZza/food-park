<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\DashboardRepositoryInterface;
use App\Models\Order;
use App\Models\OrderPlacedNotification;
use Illuminate\View\View;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function index(): View
    {

        $todaysOrders = Order::whereDay('created_at', now()->day)->count();
        $todaysEarnings = Order::whereDay('created_at', now()->day)->where('order_status', 'delivered')->sum('final_total');

        $thisMonthOrders = Order::whereMonth('created_at', now()->month)->count();
        $thisMonthEarnings = Order::whereMonth('created_at', now()->month)->where('order_status', 'delivered')->sum('final_total');

        $thisYearOrders = Order::whereYear('created_at', now()->year)->count();
        $thisYearEarnings = Order::whereYear('created_at', now()->year)->where('order_status', 'delivered')->sum('final_total');
        return view('Admin.Dashboard.index', compact(
            'todaysOrders',
            'todaysEarnings',
            'thisMonthOrders',
            'thisMonthEarnings',
            'thisYearOrders',
            'thisYearEarnings'
        ));
    }

    public function clearNotification()
    {
        try {
            OrderPlacedNotification::query()->update(['seen' => 1]);
            toastr()->success('Notification Cleared Successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
