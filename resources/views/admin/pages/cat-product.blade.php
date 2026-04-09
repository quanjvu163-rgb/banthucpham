<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header font-weight-bold">Danh mục sản phẩm</div>
            <div class="card-body">
                <form action="{{ url('/admin/index.php?view=cat-product') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="Mota" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header font-weight-bold">Danh sách</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->ID_DanhMuc }}</td>
                                <td>{{ $category->TenDanhMuc }}</td>
                                <td>{{ $category->Mota }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('/admin/index.php?view=fixCategory&id=' . $category->ID_DanhMuc) }}">Sửa</a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/admin/index.php?view=deleteCategory&id=' . $category->ID_DanhMuc) }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
