<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="{{ url('/admin/index.php?view=list-product') }}" method="POST">
                    @csrf
                    <input type="search" class="form-control form-search mr-2" placeholder="Tìm kiếm" name="tukhoa">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Số lượng</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Quản lý</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->ID_SanPham }}</td>
                            <td>{{ $product->TenSanPham }}</td>
                            <td>{{ $product->MoTa }}</td>
                            <td>{{ $product->SoLuong }}</td>
                            <td><img style="width: 276px; height: 247px;" src="{{ asset('image/product/' . $product->Img) }}" alt="{{ $product->TenSanPham }}"></td>
                            <td>{{ number_format($product->GiaBan, 0, ',', '.') }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('/admin/index.php?view=deleteProduct&id=' . $product->ID_SanPham) }}">Xóa</a>
                                <br><br>
                                <a class="btn btn-primary" href="{{ url('/admin/index.php?view=suaSanPham&id=' . $product->ID_SanPham) }}">Sửa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">Trước</span>
                            <span class="sr-only">Sau</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
