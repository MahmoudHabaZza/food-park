<?php

namespace App\Repositories\Admin;

use App\DataTables\BlogCommentDataTable;
use App\Interfaces\Admin\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface {
    public function index(BlogCommentDataTable $dataTable)
    {
        return $dataTable->render('Admin.Blog.Comment.index');
    }
}
