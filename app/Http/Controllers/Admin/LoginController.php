<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('admin.login', [
            'title'=>'Trang đăng nhập'
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);

        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]))
        {
            Session()->flash('success','đăng nhập thành công');
            return redirect()->route('admin');
        }

        Session()->flash('error','tài khoản hoặc mật khẩu không tồn tại');
        return redirect()->back();
    }

}
