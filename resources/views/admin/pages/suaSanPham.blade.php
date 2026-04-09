<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">Sửa sản phẩm</div>
        <div class="card-body">
            <form action="{{ url('/admin/index.php?view=suaSanPham&id=' . $product->ID_SanPham) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" type="text" name="TenSanPham" value="{{ $product->TenSanPham }}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" type="text" name="MoTa" value="{{ $product->MoTa }}">
                </div>
                <div class="form-group">
                    <label>Giá bán</label>
                    <input class="form-control" type="text" name="GiaBan" value="{{ $product->GiaBan }}">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label><br>
                    <img src="{{ asset('image/product/' . $product->Img) }}" style="width: 276px; height: 247px;" alt="{{ $product->TenSanPham }}">
                    <input class="form-control mt-3" type="text" name="Img" value="{{ $product->Img }}">
                </div>
                <div class="d-none">
                    <input type="text" name="SoLuong" value="{{ $product->SoLuong }}">
                    <input type="text" name="danhmuc" value="{{ $product->ID_DanhMuc }}">
                    <input type="text" name="nhacungcap" value="{{ $product->ID_NhaCungCap }}">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
            </form>
        </div>
    </div>
</div>
