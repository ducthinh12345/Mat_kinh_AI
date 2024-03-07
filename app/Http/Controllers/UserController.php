<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Http\Controllers\Controller;
use Session;

class UserController extends Controller
{    
    public function Resign_account(Request $request)  {
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
        Session::flash('success', 'Bạn tạo bài post thành công');
        // return redirect()->route('posts');
        return $request;
    }

    public function Get_user(Request $request) {
        $user_data = User::where("id",$request->id)->take(1)->get();
        return $user_data;
    }
}
