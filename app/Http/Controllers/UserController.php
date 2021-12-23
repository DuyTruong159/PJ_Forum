<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if($re -> hasFile('avatar'))
            {
                $file = $re -> file('avatar');
                error_log($file);
                $user -> avatar = $file -> move('assert/img', $file->getClientOriginalName());
                error_log($user -> avatar);
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
            return redirect(route('home')) -> with('status', 'Success');
        }

        return redirect(route('home')) -> with('status', 'Unsuccess');
    }
}
