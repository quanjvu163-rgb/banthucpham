@php
    $statusLabels = [
        0 => 'Đang chờ duyệt',
        1 => 'Đã duyệt',
        2 => 'Đã hủy',
    ];
@endphp

<div id="content" class="container-fluid">
    <div class="card mb-4">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0">Chỉnh sửa đơn hàng</h5>
            <a class="btn btn-secondary btn-sm" href="{{ url('/admin/index.php?view=dashboard') }}">Quay lại</a>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/index.php?view=edit-order&id=' . $invoice->ID_HoaDon) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mã hóa đơn</label>
                            <input class="form-control" type="text" value="{{ $invoice->ID_HoaDon }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mã khách hàng</label>
                            <input class="form-control" type="text" value="{{ $invoice->ID_ThanhVien }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input class="form-control" type="text" value="{{ optional($invoice->member)->HoVaTen ?? 'Không xác định' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thời gian tạo</label>
                            <input class="form-control" type="text" value="{{ $invoice->ThoiGianLap }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="SoDienThoai" value="{{ old('SoDienThoai', $invoice->SoDienThoai) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input class="form-control" type="text" value="{{ number_format($invoice->GiaTien, 0, ',', '.') }} đ" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="DiaChi" value="{{ old('DiaChi', $invoice->DiaChi) }}">
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <input class="form-control" type="text" name="GhiChu" value="{{ old('GhiChu', $invoice->GhiChu) }}">
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="XuLy">
                        @foreach($statusLabels as $value => $label)
                            <option value="{{ $value }}" {{ (int) old('XuLy', $invoice->XuLy) === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Lưu đơn hàng</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header font-weight-bold">Chi tiết đơn hàng</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-checkall mb-0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->ID_SanPham }}</td>
                            <td>{{ $item->TenSanPham }}</td>
                            <td>{{ $item->SoLuong }}</td>
                            <td>{{ number_format($item->GiaBan, 0, ',', '.') }} đ</td>
                            <td>{{ number_format($item->GiaBan * $item->SoLuong, 0, ',', '.') }} đ</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Đơn hàng này chưa có sản phẩm.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
