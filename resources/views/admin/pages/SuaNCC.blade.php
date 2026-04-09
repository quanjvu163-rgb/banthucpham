<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">Sửa nhà cung cấp</div>
        <div class="card-body">
            <form action="{{ url('/admin/index.php?view=SuaNCC&id_NCC=' . $supplier->ID_NCC) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên nhà cung cấp</label>
                    <input class="form-control" type="text" name="name" value="{{ $supplier->TenNCC }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="{{ $supplier->Email }}">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" type="text" name="SoDienThoai" value="{{ $supplier->SoDienThoai }}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="DiaChi" value="{{ $supplier->DiaChi }}">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
            </form>
        </div>
    </div>
</div>
