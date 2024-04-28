<?php

namespace App\Repositories\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Interfaces\Admin\WhyChooseUsRepositoryInterface;

class WhyChooseUsRepository implements WhyChooseUsRepositoryInterface
{
    public function index(WhyChooseUsDataTable $datatable)
    {
        return $datatable->render('admin.WhyChooseUs.index');
    }
}
