<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\DashboardRepositoryInterface;
use App\Models\OrderPlacedNotification;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $dashboardRepository;
    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }
    public function index()
    {

        return $this->dashboardRepository->index();
    }

    public function clearNotification()
    {
        return $this->dashboardRepository->clearNotification();
    }
}
