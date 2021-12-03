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
}
