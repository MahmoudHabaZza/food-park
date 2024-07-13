<?php

namespace App\Repositories\Admin;

use App\DataTables\BlogCommentDataTable;
use App\Interfaces\Admin\CommentRepositoryInterface;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class CommentRepository implements CommentRepositoryInterface {
    public function index(BlogCommentDataTable $dataTable)
    {
        return $dataTable->render('Admin.Blog.Comment.index');
    }
    public function updateStatus(Request $request, string $id)
    {
        try {
            $comment = BlogComment::find($id);
            $comment->status = $request->status;
            $comment->save();
            return response(['status'=> 'Success','message' => 'Status Updated Successfully']);
        }catch(\Exception $e) {
            return response(['status'=> 'error','message' => 'something went wrong']);
        }
    }

    public function destroy(string $id)
    {
        try {
            $comment = BlogComment::find($id);
            $comment->delete();
            return response(['status'=> 'success','message' => 'comment deleted successfully']);
        }catch(\Exception $e) {
            return response(['status'=> 'error','message' => 'something went wrong']);
        }
    }
}
