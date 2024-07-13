<?php

namespace App\Interfaces\Admin;

use App\DataTables\BlogCommentDataTable;
use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function index(BlogCommentDataTable $dataTable);
    public function updateStatus(Request $request,string $id);
    public function destroy(string $id);
}
