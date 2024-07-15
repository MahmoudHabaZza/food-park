<?php

namespace App\Interfaces\Admin;

use App\DataTables\SubscriberDataTable;
use Illuminate\Http\Request;

interface NewsLetterRepositoryInterface
{
    public function index(SubscriberDataTable $dataTable);
    public function sendNewsLetter(Request $request);
    public function destroyEmail(string $id);
}
