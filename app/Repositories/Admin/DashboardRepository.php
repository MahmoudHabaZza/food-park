<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\DashboardRepositoryInterface;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderPlacedNotification;
use App\Models\Product;
use App\Models\User;
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

        $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status','delivered')->sum('final_total');

        $totalUsers = User::where('role','user')->count();
        $totalAdmins = User::where('role','admin')->count();

        $totalProducts = Product::count();
        $totalBlogs = Blog::count();
        return view('Admin.Dashboard.index', compact(
            'todaysOrders',
            'todaysEarnings',
            'thisMonthOrders',
            'thisMonthEarnings',
            'thisYearOrders',
            'thisYearEarnings',
            'totalOrders',
            'totalEarnings',
            'totalUsers',
            'totalAdmins',
            'totalProducts',
            'totalBlogs',
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
