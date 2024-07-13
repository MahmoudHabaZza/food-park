<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentRepository;
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function index(BlogCommentDataTable $dataTable)
    {
        return $this->commentRepository->index($dataTable);
    }
    public function updateStatus(Request $request,string $id)
    {
        return $this->commentRepository->updateStatus($request, $id);
    }
    public function destroy(string $id)
    {
        return $this->commentRepository->destroy($id);
    }

}
