<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
        $blog -> UserId = Cookie::get('id');
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

    public function update(Request $re, $id)
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

        return redirect(route('profile')) -> with('status', 'Updated');
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
        $blog -> UserId = Cookie::get('id');
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

    public function delete($id)
    {
        Blog::find($id) -> Comment() -> delete();
        Blog::where('Id', $id) -> delete();
    }

    public function chart()
    {
        $blog = Blog::whereYear('Created_date', '=', now()->year) -> get();
        $data = [];
        $jan = 0; $feb = 0; $mar = 0; $apr = 0; $may = 0; $jun = 0;
        $jul = 0; $aug = 0; $sep = 0; $oct = 0; $nov = 0; $dec = 0;

        foreach ($blog as $b)
        {
            $month = Carbon::parse($b->Created_date)->format('m');

            switch($month)
            {
                case('1'):
                    $jan++;
                    break;
                case('2'):
                    $feb++;
                    break;
                case('3'):
                    $mar++;
                    break;
                case('4'):
                    $apr++;
                    break;
                case('5'):
                    $may++;
                    break;
                case('6'):
                    $jun++;
                    break;
                case('7'):
                    $jul++;
                    break;
                case('8'):
                    $aug++;
                    break;
                case('9'):
                    $sep++;
                    break;
                case('10'):
                    $oct++;
                    break;
                case('11'):
                    $nov++;
                    break;
                case('12'):
                    $dec++;
                    break;
            }
        }

        array_push($data, $jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec);

        return view('admin.chartAdmin', compact('data'));
    }

    public function chartFormat(Request $re)
    {
        $blog = Blog::whereYear('Created_date', '=', $re->year) -> get();
        $data = [];
        $jan = 0; $feb = 0; $mar = 0; $apr = 0; $may = 0; $jun = 0;
        $jul = 0; $aug = 0; $sep = 0; $oct = 0; $nov = 0; $dec = 0;

        foreach ($blog as $b)
        {
            $month = Carbon::parse($b->Created_date)->format('m');

            switch($month)
            {
                case('1'):
                    $jan++;
                    break;
                case('2'):
                    $feb++;
                    break;
                case('3'):
                    $mar++;
                    break;
                case('4'):
                    $apr++;
                    break;
                case('5'):
                    $may++;
                    break;
                case('6'):
                    $jun++;
                    break;
                case('7'):
                    $jul++;
                    break;
                case('8'):
                    $aug++;
                    break;
                case('9'):
                    $sep++;
                    break;
                case('10'):
                    $oct++;
                    break;
                case('11'):
                    $nov++;
                    break;
                case('12'):
                    $dec++;
                    break;
            }
        }

        array_push($data, $jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec);

        return view('admin.chartAdmin', compact('data'));
    }
}
