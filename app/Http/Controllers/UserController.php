<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function Resign_account(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->user_name = $request->user_name;
        $user->pass_word = $request->pass_word;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->account_status = $request->account_status;
        $user->save();
        Session::flash('success', 'Bạn đăng ký tài khoảng thành công');
        // return redirect()->route('posts');
        return $user;
    }

    public function Get_user(Request $request)
    {
        $user_data = User::where("id", $request->id)->take(1)->get();
        // $user_data = User::where("user_name", $request->user_name)->take(1)->get("user_name");
        return $user_data[0]->user_name;
    }

    public function Update_user(Request $request)
    {
        $user_data = User::find($request->id);
        if(!$user_data) return 400;
        (!$request->name)       ? $user_data->name          = $user_data->name          : $user_data->name          = $request->name;
        (!$request->birth_date) ? $user_data->birth_date    = $user_data->birth_date    : $user_data->birth_date    = $request->birth_date;
        (!$request->email)      ? $user_data->email         = $user_data->email         : $user_data->email         = $request->email;
        (!$request->phone)      ? $user_data->phone         = $user_data->phone         : $user_data->phone         = $request->phone;
        (!$request->address)    ? $user_data->address       = $user_data->address       : $user_data->address       = $request->address;
        $user_data->save();
        Session::flash('success', 'Bạn thay đổi thông tài khoảng thành công');
        // return redirect()->route('posts');
        return $user_data;
    }

    public function Delete_user(Request $request)
    {
        $user_data = User::find($request->id);
        if(!$user_data) return 400;
        $user_data->account_status = 0;
        $user_data->save();
        Session::flash('success', 'Bạn xóa tài khoảng thành công');
        return $user_data;
    }
}
