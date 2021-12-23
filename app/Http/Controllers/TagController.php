<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::all() -> random(5);
        return view('index', compact('tag'));
    }

    public function blogPost()
    {
        $tag = Tag::all();
        return view('blogPost', compact('tag'));
    }

    public function TagDetail($id)
    {
        $blog = Tag::find($id) -> Blog() -> paginate(10);
        return view('tagDetail', compact('blog'));
    }

//---------------------------BackEnd--------------------//

    public function BlogA()
    {
        $tag = Tag::all();
        return view('admin.blogEditAdmin', compact('tag'));
    }

    public function TagA()
    {
        $tag = Tag::orderByDesc('Created_date')->paginate(10);
        return view('admin.tagAdmin', compact('tag'));
    }
}
