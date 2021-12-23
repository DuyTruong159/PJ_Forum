<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
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

    public function search(Request $re)
    {
        $search = $re -> input('search');
        $blog = Blog::where('Title', 'like', '%'.$search.'%') -> where('Active', '1') -> paginate(10);

        return view('search', compact('blog'));
    }

//-----------------BackEnd-----------------//

    public function blogAll()
    {
        $blog = Blog::orderByDesc('Created_date')->paginate(10);
        return view('admin.blogAdmin', compact('blog'));
    }

    public function blogInsert(Request $re)
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

        return redirect(route('blogA')) -> with('status', 'Success');
    }

    public function blogUpdate($id)
    {
        $tag = Tag::all();
        $blog = Blog::find($id);
        return view('admin.blogUpdateAdmin', compact('blog', 'tag'));
    }

    public function blogUpdateDone(Request $re, $id)
    {
        $validated = $re->validate([
            'title' => 'required',
            'post_content' => 'required'
        ],
        [
            'title.required' => 'Tiêu đề bài viết bị trống!!!',
            'post_content.required' => 'Nội dung bị trống!!!'
        ]);

        if($re -> input('is_public')=="1")
        {
            $a = $re -> input('is_public');
        }
        else
        {
            $a = 0;
        }

        $blog = Blog::where('Id', $id) -> update([
            'Title' => $re -> input('title'),
            'Content' => $re -> input('post_content'),
            'TagId' => $re -> input('tag'),
            'Active' => $a
        ]);

        return redirect(route('blogA')) -> with('status', 'Updated');
    }
}
