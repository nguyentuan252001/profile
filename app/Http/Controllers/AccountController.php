<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountLoginRequest;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index()
    {
        return view('admin.page.account.index');
    }

    public function data()
    {
        $data = Account::get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(CreateAccountRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        Account::create($data);
        return response()->json([
            'status' => true
        ]);
    }

    public function viewLogin()
    {
        return view('client.page.login.index');
    }

    public function actionLogin(AccountLoginRequest $request)
    {
        $check = Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if ($check) {
            toastr()->success("Login Thành công!");
            return redirect('/admin/config');
        } else {
            toastr()->error("Sai tên đăng nhập hoặc mật khẩu!");
            return redirect('/admin/login');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();

        toastr()->success("Logout Thành công!");
        return redirect('/admin/login');
    }
}
