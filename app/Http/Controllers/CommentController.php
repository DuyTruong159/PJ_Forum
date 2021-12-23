<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function insert(Request $re, $id)
    {
        $validated = $re -> validate([
            'cmt' => 'required'
        ],
        [
            'cmt.required' => 'Bình luận bị trống!!!'
        ]);

        $comment = new Comment;
        $comment->Content = $re->input('cmt');
        $comment->BlogId = $id;
        $comment->save();

        return redirect(route('blogDetail', ['blogId'=>$id])) -> with('status', 'CommentSuccess');
    }

//---------------------------BackEnd--------------------//
    public function CommentA()
    {
        $comment = Comment::orderByDesc('Created_date')->paginate(10);
        return view('admin.commentAdmin', compact('comment'));
    }
}
