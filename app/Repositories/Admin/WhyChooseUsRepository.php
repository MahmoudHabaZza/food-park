<?php

namespace App\Repositories\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Interfaces\Admin\WhyChooseUsRepositoryInterface;
use App\Models\SectionTitle;

class WhyChooseUsRepository implements WhyChooseUsRepositoryInterface
{
    public function index(WhyChooseUsDataTable $datatable)
    {
        $keys = ['why_choose_top_title', 'why_choose_main_title', 'why_choose_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $datatable->render('admin.WhyChooseUs.index', compact('titles'));
    }
}
