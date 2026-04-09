@extends('layouts.app')

@section('title', 'Thanh toán')

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@section('content')
<div class="container mt-4">
    <form class="needs-validation" method="POST" action="{{ url('/order/phuongthucthanhtoan.php?id=' . $member->ID_ThanhVien) }}">
        @csrf

        <div class="py-4 text-center">
            <h2>Thanh toán</h2>
            <p class="lead">Vui lòng kiểm tra thông tin khách hàng và giỏ hàng trước khi đặt hàng.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Giỏ hàng</span>
                    <span class="badge badge-secondary badge-pill">{{ !empty($cart) ? $cartItems : $items->sum('SoLuong') }}</span>
                </h4>
                <div class="tableInfo">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        @if(!empty($cart))
                            <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['TenSanPham'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                        <td>{{ number_format($item['GiaBan'], 0, ',', '.') }} Đồng</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->TenSanPham }}</td>
                                        <td>{{ $item->SoLuong }}</td>
                                        <td>{{ number_format($item->GiaBan, 0, ',', '.') }} Đồng</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                    <h5 class="text-right">Tổng tiền: {{ number_format(!empty($cart) ? $cartTotal : $invoice->GiaTien, 0, ',', '.') }} Đồng</h5>
                </div>
            </div>

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thông tin khách hàng</h4>

                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" value="{{ $member->HoVaTen }}" readonly>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" value="{{ $invoice->DiaChi }}" readonly>
                </div>
                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" class="form-control" value="{{ $member->SoDienThoai }}" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ $member->Email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Ghi chú</label>
                    <input type="text" class="form-control" value="{{ $invoice->GhiChu }}" readonly>
                </div>
                <div class="form-group">
                    <label>Tổng tiền</label>
                    <input type="text" class="form-control" value="{{ number_format($invoice->GiaTien, 0, ',', '.') }}" readonly>
                </div>

                <label>Phương thức thanh toán</label>
                <br>
                <select class="form-control" name="selectPay">
                    <option value="shipchuyenkhoan" selected>Thanh toán bằng thẻ</option>
                    <option value="shipcod">Thanh toán khi nhận hàng</option>
                </select>
                <br>

                <input type="submit" class="btn btn-info" name="dathang" value="Đặt hàng">
                <a class="btn btn-primary" href="{{ url('/order/suaOrder.php?id=' . $invoice->ID_HoaDon) }}">Sửa lại thông tin giao hàng</a>
            </div>
        </div>
    </form>
</div>
@endsection
