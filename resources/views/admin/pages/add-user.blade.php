<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">Thêm người dùng</div>
        <div class="card-body">
            <form action="{{ url('/admin/index.php?view=add-user') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input class="form-control" type="text" name="fullname">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="address">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" type="text" name="phonenumber">
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
