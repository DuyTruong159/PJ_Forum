<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        return view('blogDetail', compact('blog'));
    }

    public function insert(Request $re)
    {
        $validated = $re->validate([
            'title' => 'required',
            'post_content' => 'required'
        ],
        [
            'title.required' => 'Tiêu đề bài viết bị trống!!!',
            'post_content.required' => 'Nội dung bị trống!!!'
        ]);

        $blog = new Blog;
        $blog -> TagId = $re -> input('tag');
        $blog -> Title = $re -> input('title');
        $blog -> Content = $re -> input('post_content');
        if($re -> input('is_public')=="1")
        {
            $blog -> Active = $re -> input('is_public');
        }
        else
        {
            $blog -> Active = 0;
        }
        $blog -> save();

        return redirect(route('blogPost')) -> with('status', 'Success');

    }
}
