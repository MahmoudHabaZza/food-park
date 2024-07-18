<?php

namespace App\Interfaces\Admin;

use App\DataTables\TodaysOrderDataTable;

interface DashboardRepositoryInterface {
    public function index(TodaysOrderDataTable $dataTable);
    public function clearNotification();
}
