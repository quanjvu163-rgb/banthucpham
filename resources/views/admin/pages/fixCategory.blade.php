<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">Chỉnh sửa thông tin danh mục</div>
        <div class="card-body">
            <form action="{{ url('/admin/index.php?view=fixCategory&id=' . $category->ID_DanhMuc) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input class="form-control" type="text" name="TenDanhMuc" value="{{ $category->TenDanhMuc }}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="Mota">{{ $category->Mota }}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
            </form>
        </div>
    </div>
</div>
