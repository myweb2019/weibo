<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
    //注册写入
    public function store(Request $request)

    {
        //验证信息
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        //用户注册写入数据库
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password),
        ]);
        return "注册成功";
    }

}
