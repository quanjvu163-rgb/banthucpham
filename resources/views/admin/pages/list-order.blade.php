<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0">Doanh thu của cửa hàng</h5>
        </div>
        <table class="table table-striped table-checkall">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID hóa đơn</th>
                    <th>ID thành viên</th>
                    <th>Thời gian thanh toán</th>
                    <th>Địa chỉ khách hàng</th>
                    <th>Giá tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->ID_HoaDon }}</td>
                        <td>{{ $order->ID_ThanhVien }}</td>
                        <td>{{ $order->ThoiGianLap }}</td>
                        <td>{{ $order->DiaChi }}</td>
                        <td>{{ $order->GiaTien }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <h4 style="float: right;">Tổng tiền: {{ (int) $totalMoney }} Đồng</h4>
        </nav>
    </div>
</div>
