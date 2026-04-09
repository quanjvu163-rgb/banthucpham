<div class="card">
    <div class="card-header font-weight-bold">Chỉnh sửa thông tin người dùng</div>
    <div class="card-body">
        <form action="{{ url('/admin/index.php?view=fixUser&id=' . $member->ID_ThanhVien) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Họ và tên</label>
                <input class="form-control" type="text" name="HoVaTen" value="{{ $member->HoVaTen }}">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input class="form-control" type="text" name="DiaChi" value="{{ $member->DiaChi }}">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input class="form-control" type="text" name="SoDienThoai" value="{{ $member->SoDienThoai }}">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
        </form>
    </div>
</div>
