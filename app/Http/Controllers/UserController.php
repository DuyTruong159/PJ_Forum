<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function insert(Request $re)
    {
        $validated = $re -> validate([
            'nickname' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm' => 'required'
        ],
        [
            'nickname.required' => 'Biệt danh không bỏ trống!!',
            'email.required' => 'Email không bỏ trống!!',
            'username.required' => 'Username không bỏ trống!!',
            'password.required' => 'Password không bỏ trống!!',
            'confirm.required' => 'Confirm Password không bỏ trống!!'
        ]);

        if($re -> input('password') == $re -> input('confirm'))
        {
            $user = new User;
            $user -> nickname = $re -> input('nickname');
            $user -> email = $re -> input('email');
            $user -> sex = $re -> input('sex');
            $user -> username = $re -> input('username');
            $user -> password = bcrypt($re -> input('password'));
            $user -> password_confirm = $re -> input('confirm');
            $user -> role = 'User';
            if($re -> hasFile('avatar'))
            {
                $file = $re -> file('avatar');
                error_log($file);
                $user -> avatar = $file -> move('/assert/img', $file->getClientOriginalName());
                error_log($user -> avatar);
            }
            else
            {
                $user -> avatar = 'assert/img/blank-avatar.jpeg';
            }
            $user->save();


            return redirect(route('home'));
        }

        return redirect('/register') -> with('status', 'Unsuccess');
    }

    public function login(Request $re)
    {
        if(empty($re->input('username')) || empty($re->input('password')))
        {
            return redirect(route('home')) -> with('status', 'Empty');
        }

        if(Auth::attempt(['username' => $re->input('username'), 'password' => $re->input('password')]))
        {
            // dd(Auth::user()->Id);
            Cookie::queue('login', Auth::check(), 60);
            Cookie::queue('role', Auth::user()->role, 60);
            Cookie::queue('id', Auth::user()->Id, 60);
            Cookie::queue('nickname', Auth::user()->nickname, 60);
            Cookie::queue('avatar', Auth::user()->avatar, 60);
            return redirect(route('home')) -> with('status', 'Success');
        }

        return redirect(route('home')) -> with('status', 'Unsuccess');
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('login'));
        Cookie::queue(Cookie::forget('role'));
        Cookie::queue(Cookie::forget('id'));
        Cookie::queue(Cookie::forget('nickname'));
        Cookie::queue(Cookie::forget('avatar'));
        return redirect(route('home'));
    }

//-----------------Backend----------------//

    public function userA()
    {
        $user = User::orderByDesc('Created_date')->paginate(10);
        return view('admin.userAdmin', compact('user'));
    }

    public function userAinsert(Request $re)
    {
        $validated = $re -> validate([
            'nickname' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm' => 'required'
        ],
        [
            'nickname.required' => 'Biệt danh không bỏ trống!!',
            'email.required' => 'Email không bỏ trống!!',
            'username.required' => 'Username không bỏ trống!!',
            'password.required' => 'Password không bỏ trống!!',
            'confirm.required' => 'Confirm Password không bỏ trống!!'
        ]);

        if($re -> input('password') == $re -> input('confirm'))
        {
            $user = new User;
            $user -> nickname = $re -> input('nickname');
            $user -> email = $re -> input('email');
            $user -> sex = $re -> input('sex');
            $user -> role = $re -> input('role');
            $user -> username = $re -> input('username');
            $user -> password = bcrypt($re -> input('password'));
            $user -> password_confirm = $re -> input('confirm');
            if($re -> hasFile('avatar'))
            {
                $file = $re -> file('avatar');
                error_log($file);
                $user -> avatar = $file -> move('assert/img', $file->getClientOriginalName());
                error_log($user -> avatar);
            }
            else
            {
                $user -> avatar = 'assert/img/blank-avatar.jpeg';
            }
            $user->save();


            return redirect(route('userA')) -> with('status', 'Success');
        }

        return redirect(route('userA')) -> with('status', 'Unsuccess');
    }

    public function userAupdate(Request $re, $id)
    {
        $validated = $re -> validate([
            'nickname' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'nickname.required' => 'Biệt danh không bỏ trống!!',
            'email.required' => 'Email không bỏ trống!!',
            'username.required' => 'Username không bỏ trống!!',
            'password.required' => 'Password không bỏ trống!!'
        ]);

        if($re -> hasFile('avatar'))
        {
            $file = $re -> file('avatar');
            error_log($file);
            $avatar = $file -> move('assert/img', $file->getClientOriginalName());
        }
        else
        {
            $avatar = User::find($id) -> avatar;
        }

        User::where('Id', $id) -> update([
            'username' => $re -> input('username'),
            'password' => bcrypt($re -> input('password')),
            'nickname' => $re -> input('nickname'),
            'email' => $re -> input('email'),
            'avatar' => $avatar,
            'sex' => $re -> sex,
            'role' => $re -> role,
            'password_confirm' => $re -> input('password')
        ]);

        return redirect(route('userA')) -> with('status', 'Updated');
    }

    public function delete($id)
    {
        $user = User::find($id) -> Blog;

        foreach ($user as $u) {
            $u -> Comment() -> delete();
        }

        User::find($id) -> Blog() -> delete();

        User::where('Id', $id) -> delete();

        return 'success';
    }
}
