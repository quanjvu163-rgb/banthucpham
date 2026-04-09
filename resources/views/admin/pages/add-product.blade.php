<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">Thêm sản phẩm</div>
        <div class="card-body">
            <form action="{{ url('/admin/index.php?view=add-product') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" type="text" name="TenSanPham">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" type="text" name="GiaBan">
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" type="text" name="SoLuong">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="MoTa" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input class="form-control" type="text" name="Img">
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="danhmuc">
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->ID_DanhMuc }}">{{ $category->TenDanhMuc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nhà cung cấp</label>
                    <select class="form-control" name="nhacungcap">
                        <option value="">Chọn nhà cung cấp</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->ID_NCC }}">{{ $supplier->TenNCC }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Thêm mới" name="submit">
            </form>
        </div>
    </div>
</div>
