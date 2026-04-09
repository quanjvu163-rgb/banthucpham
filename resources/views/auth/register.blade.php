<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ThanhVien/register.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg header-custom sticky-top">
            <div class="container-fluid font-header-custom">
                <a class="navbar-branch" href="{{ url('/index.php') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/ThanhVien/login.php') }}">ĐĂNG NHẬP</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h4 class="text-center text-danger">
            @if($error)
                {{ $error }}
            @elseif($success)
                <span class="text-success">{{ $success }}</span>
            @endif
        </h4>

        <form action="{{ url('/ThanhVien/register.php') }}" method="POST">
            @csrf
            <h3>ĐĂNG KÝ</h3>
            <hr>

            <label><b>Họ và Tên</b></label>
            <input type="text" name="fullname" required value="{{ old('fullname') }}">

            <label><b>Địa Chỉ</b></label>
            <input type="text" name="address" required value="{{ old('address') }}">

            <label><b>Email</b></label>
            <input type="text" name="email" required value="{{ old('email') }}">

            <label><b>Số điện thoại</b></label>
            <input type="text" name="phonenumber" required value="{{ old('phonenumber') }}">

            <label><b>Tên tài khoản</b></label>
            <input type="text" name="username" required value="{{ old('username') }}">

            <label><b>Mật khẩu</b></label>
            <input type="password" name="password" required>

            <label><b>Nhập lại mật khẩu</b></label>
            <input type="password" name="password-repeat" required>

            <div class="clearfix">
                <button type="submit" class="signupbtn" name="submit">Đăng ký</button>
            </div>
        </form>
    </div>
</body>
</html>
