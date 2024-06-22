<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade

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

    public function update(Request $request, $id)
    {
        // $user = User::find($id);
        Log::info('Current User:', ['id' => $id]); 
        // $user->user_name = $request->input('user_name');
        // $user->password = bcrypt($request->input('password')); // Encrypt the password
        // $user->user_fullname = $request->input('user_fullname');
        // $user->user_email = $request->input('user_email');
        // $user->user_birth = $request->input('user_birth');
        // $user->user_gender = $request->input('user_gender');
        // $user->user_office = $request->input('user_office'); // Ensure this field is processed
        // $user->save();
        // return redirect()->back();
    }
}
