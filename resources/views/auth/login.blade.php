<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ThanhVien/login.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div id="login" class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <h2 class="text-center text-info pt-4">Đăng Nhập Tài Khoản Của Bạn</h2>
                    <h4 class="text-center text-danger">
                        @if($error)
                            {{ $error }}
                        @endif
                    </h4>

                    <form method="POST" action="{{ url('/ThanhVien/login.php') }}" class="px-4">
                        @csrf
                        <div class="form-group">
                            <label class="text-info">Tên đăng nhập:</label>
                            <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-info">Mật khẩu:</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <input type="submit" class="btn btn-info btn-md" name="login" value="ĐĂNG NHẬP">
                    </form>

                    <div class="px-4 pb-4">
                        <h6>Bạn chưa có tài khoản? Hãy đăng ký</h6>
                        <a class="text-info float-right" href="{{ url('/admin/login.php') }}">Bạn là admin?</a>
                        <form method="GET" action="{{ url('/ThanhVien/register.php') }}">
                            <input type="submit" class="btn btn-info btn-md" value="ĐĂNG KÝ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
