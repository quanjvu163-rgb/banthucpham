<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AuthController extends Controller
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
                $member = Member::where('TenDangNhap', $username)->first();

                if ($member && $this->passwordMatches($member->MatKhau, $password)) {
                    $request->session()->regenerate();
                    session([
                        'TenDangNhap' => $member->TenDangNhap,
                        'HoVaTen' => $member->HoVaTen,
                        'ID_ThanhVien' => $member->ID_ThanhVien,
                        'Email' => $member->Email,
                    ]);

                    return redirect('/index.php');
                }

                $error = 'Tài khoản hoặc mật khẩu sai.';
            }
        }

        return view('auth.login', compact('error'));
    }

    public function register(Request $request)
    {
        $error = null;
        $success = null;

        if ($request->isMethod('post')) {
            $username = trim((string) $request->input('username'));
            $password = (string) $request->input('password');
            $passwordRepeat = (string) $request->input('password-repeat');
            $email = trim((string) $request->input('email'));
            $fullname = trim((string) $request->input('fullname'));
            $address = trim((string) $request->input('address'));
            $phone = trim((string) $request->input('phonenumber'));

            if ($username === '' || $password === '' || $passwordRepeat === '' || $email === '' || $fullname === '' || $address === '' || $phone === '') {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } elseif ($password !== $passwordRepeat) {
                $error = 'Mật khẩu nhập lại không khớp.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email bạn vừa nhập không đúng định dạng.';
            } elseif (!preg_match('/^[0-9]+$/', $phone)) {
                $error = 'Số điện thoại không hợp lệ.';
            } elseif (Member::where('TenDangNhap', $username)->exists()) {
                $error = 'Tên đăng nhập đã tồn tại.';
            } else {
                Member::create([
                    'TenDangNhap' => $username,
                    'MatKhau' => $password,
                    'Email' => $email,
                    'HoVaTen' => $fullname,
                    'DiaChi' => $address,
                    'SoDienThoai' => $phone,
                    'NgayDangKi' => now()->toDateString(),
                ]);

                $success = 'Đăng ký thành công.';
            }
        }

        return view('auth.register', compact('error', 'success'));
    }

    public function logout()
    {
        session()->flush();

        return redirect('/index.php');
    }

    public function profile(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->memberFromRequestOrSession($request);

        return view('auth.profile', compact('member'));
    }

    public function profileFix(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->memberFromRequestOrSession($request);
        $error = null;

        if ($request->isMethod('post')) {
            $fullname = trim((string) $request->input('HoVaTen'));
            $email = trim((string) $request->input('Email'));
            $phone = trim((string) $request->input('SoDienThoai'));
            $address = trim((string) $request->input('DiaChi'));

            if ($fullname === '' || $email === '' || $phone === '' || $address === '') {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email không hợp lệ.';
            } elseif (!preg_match('/^[0-9]+$/', $phone)) {
                $error = 'Số điện thoại không hợp lệ.';
            } else {
                $member->update([
                    'HoVaTen' => $fullname,
                    'Email' => $email,
                    'SoDienThoai' => $phone,
                    'DiaChi' => $address,
                ]);

                session()->flush();

                return redirect('/ThanhVien/login.php');
            }
        }

        return view('auth.profile-fix', compact('member', 'error'));
    }

    public function changePassword(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->memberFromRequestOrSession($request);
        $error = null;

        if ($request->isMethod('post')) {
            $oldPassword = (string) $request->input('old-password');
            $newPassword = (string) $request->input('new-password');
            $newPasswordRepeat = (string) $request->input('new-password-repeat');

            if ($oldPassword === '' || $newPassword === '' || $newPasswordRepeat === '') {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } elseif (!$this->passwordMatches($member->MatKhau, $oldPassword)) {
                $error = 'Mật khẩu hiện tại không hợp lệ.';
            } elseif ($newPassword !== $newPasswordRepeat) {
                $error = 'Mật khẩu nhập lại không trùng với mật khẩu mới.';
            } else {
                $member->update([
                    'MatKhau' => $newPassword,
                ]);

                session()->flush();

                return redirect('/ThanhVien/login.php');
            }
        }

        return view('auth.change-password', compact('member', 'error'));
    }

    private function memberFromRequestOrSession(Request $request): Member
    {
        $member = $this->currentMember();
        $fallbackId = $member ? $member->ID_ThanhVien : null;
        $requestedId = (int) $request->query('id', $fallbackId);

        if (!$member || $member->ID_ThanhVien !== $requestedId) {
            abort(403);
        }

        return $member;
    }
}
