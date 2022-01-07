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

    public function insert(Request $re)
    {
        $validated = $re->validate([
            'tag' => 'required'
        ],
        [
            'tag.required' => 'Tiêu đề bài viết bị trống!!!'
        ]);

        $tag = new Tag;
        $tag->Name = $re->input('tag');
        $tag->save();

        return redirect(route('tagA')) -> with('status', 'Success');
    }

    public function update(Request $re, $id)
    {
        $validated = $re->validate([
            'tag' => 'required'
        ],
        [
            'tag.required' => 'Tiêu đề bài viết bị trống!!!'
        ]);

        Tag::where('Id', $id) -> update([
            'Name' => $re -> input('tag')
        ]);

        return redirect(route('tagA')) -> with('status', 'Updated');
    }

    public function delete($id)
    {
        $blog = Tag::find($id) -> Blog;

        foreach ($blog as $b) {
            $b -> Comment() -> delete();
        }

        Tag::find($id) -> Blog() -> delete();

        Tag::where('Id', $id) -> delete();

        return 'success';
    }
}
