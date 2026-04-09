<div class="container-fluid py-5">
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $approvedCount }}</h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pendingCount }}</h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">DOANH SỐ</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($totalMoney, 0, ',', '.') }} đ</h5>
                    <p class="card-text">Doanh số hệ thống</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $rejectedCount }}</h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header font-weight-bold">ĐƠN HÀNG MỚI</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã đơn</th>
                        <th>Mã khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Giá tiền</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingOrders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->ID_HoaDon }}</td>
                            <td>{{ $order->ID_ThanhVien }}</td>
                            <td><a href="#">{{ $order->SoDienThoai }}</a></td>
                            <td>{{ number_format($order->GiaTien, 0, ',', '.') }} đ</td>
                            <td>{{ $order->DiaChi }}</td>
                            <td><span class="badge badge-warning">Đang chờ duyệt</span></td>
                            <td>{{ $order->ThoiGianLap }}</td>
                            <td>
                                <a href="{{ url('/admin/index.php?view=edit-order&id=' . $order->ID_HoaDon) }}" class="btn btn-success btn-sm rounded-0 text-white" title="Chỉnh sửa đơn hàng">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('/admin/index.php?view=deleteOrder&id=' . $order->ID_HoaDon) }}" class="btn btn-danger btn-sm rounded-0 text-white">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Không có đơn hàng mới.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
