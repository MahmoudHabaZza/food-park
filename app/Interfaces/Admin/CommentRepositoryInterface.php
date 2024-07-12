<?php

namespace App\Interfaces\Admin;

use App\DataTables\BlogCommentDataTable;

interface CommentRepositoryInterface
{
    public function index(BlogCommentDataTable $dataTable);
}
