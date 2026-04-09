<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">Thêm nhà cung cấp</div>
        <div class="card-body">
            <form method="POST" action="{{ url('/admin/index.php?view=add-post') }}">
                @csrf
                <div class="form-group">
                    <label>Tên nhà cung cấp</label>
                    <input class="form-control" type="text" name="TenNCC">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="Email">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" type="text" name="SoDienThoai">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="DiaChi">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input class="form-control" type="text" name="Img">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
