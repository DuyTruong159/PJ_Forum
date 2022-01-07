<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
        $comment->UserId = Cookie::get('id');
        $comment->save();

        return redirect(route('blogDetail', ['blogId'=>$id])) -> with('status', 'CommentSuccess');
    }

//---------------------------BackEnd--------------------//
    public function CommentA()
    {
        $comment = Comment::orderByDesc('Created_date')->paginate(10);
        $blog = Blog::all();
        return view('admin.commentAdmin', compact('comment', 'blog'));
    }

    public function CommentAinsert(Request $re)
    {
        $validated = $re -> validate([
            'content' => 'required'
        ],
        [
            'content.required' => 'Bình luận bị trống!!!'
        ]);

        $comment = new Comment;
        $comment->Content = $re->input('content');
        $comment->BlogId = $re->blog;
        $comment->UserId = Cookie::get('id');
        $comment->save();

        return redirect(route('commentA')) -> with('status', 'CommentSuccess');
    }

    public function delete($id)
    {
        Comment::where('Id', $id) -> delete();

        return 'success';
    }

    public function update(Request $re, $id)
    {
        $validated = $re -> validate([
            'post_content' => 'required'
        ],
        [
            'post_content.required' => 'Bình luận bị trống!!!'
        ]);

        Comment::where('Id', $id) -> update([
            'Content' => $re -> input('post_content'),
            'BlogId' => $re -> tag
        ]);
        return redirect(route('commentA')) -> with('status', 'Updated');
    }
}
