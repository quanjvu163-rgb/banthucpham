<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0">Danh sách nhà cung cấp</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-checkall">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Nhà Cung Cấp</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->TenNCC }}</td>
                            <td>{{ $supplier->Email }}</td>
                            <td>{{ $supplier->SoDienThoai }}</td>
                            <td>{{ $supplier->DiaChi }}</td>
                            <td>
                                <a class="btn btn-success btn-sm rounded-0 text-white" href="{{ url('/admin/index.php?view=SuaNCC&id_NCC=' . $supplier->ID_NCC) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm rounded-0 text-white" href="{{ url('/admin/index.php?view=deleteNCC&id_NCC=' . $supplier->ID_NCC) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
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
