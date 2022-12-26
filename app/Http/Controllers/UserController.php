<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function getDangNhap(){
        return view('admin.login');
    }
    public function postDangNhap(Request $request)   {
           if (Auth::attempt(['email' =>$request->email, 'password' => $request->password])) {
               return redirect('admin/home');
            }else{
                return redirect('admin/dangnhap')->with('thongbao','Đăng nhập lỗi');
            }
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
