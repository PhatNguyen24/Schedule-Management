<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('numberuri', ['only' => 'show']);
        $this->middleware('loggedin');
    }

    public function info()
    {
        // Đây là nơi bạn xử lý logic để lấy thông tin user
        $user = auth()->user(); // Ví dụ lấy thông tin user hiện tại, cần phải có authentication

        // Thực hiện các thao tác xử lý dữ liệu, ví dụ như:
        // $userInfo = [
        //     'name' => $user->name,
        //     'email' => $user->email,
        //     // Các thông tin khác của user
        // ];

        // Trả về view với dữ liệu user
        return view('userinfo', ['currUser' => $user]);
    }
}
