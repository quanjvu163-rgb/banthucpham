<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $error = null;

        if ($request->isMethod('post')) {
            $username = trim((string) $request->input('username'));
            $password = (string) $request->input('password');

            if ($username === '' || $password === '') {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } else {
                $admin = Admin::where('TenDangNhap', $username)->first();

                if ($admin && $this->passwordMatches($admin->MatKhau, $password)) {
                    $request->session()->regenerate();
                    session([
                        'admin' => $admin->TenDangNhap,
                        'admin_id' => $admin->ID_QuanLy,
                        'admin_name' => $admin->HoVaTen,
                    ]);

                    return redirect('/admin/index.php');
                }

                $error = 'Tài khoản hoặc mật khẩu sai.';
            }
        }

        return view('admin.auth.login', compact('error'));
    }

    public function logout()
    {
        session()->flush();

        return redirect('/admin/login.php');
    }
}
