@extends('layouts.app')

@section('title', 'Đơn hàng')

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="get-order">
                <h2>Hóa đơn mua hàng của bạn</h2>
                <br>
                <div class="alert alert-success">
                    @if($invoice)
                        <div class="form-group mb-0">
                            <label class="d-block">Tên khách hàng: {{ $member->HoVaTen }}</label>
                            <label class="d-block">Mã hóa đơn: {{ $invoice->ID_HoaDon }}</label>
                            <label class="d-block">Thời gian tạo: {{ $invoice->ThoiGianLap }}</label>
                            <label class="d-block">Tổng tiền: {{ number_format($invoice->GiaTien, 0, ',', '.') }} Đồng</label>
                            <label class="d-block">Địa chỉ: {{ $invoice->DiaChi }}</label>
                            <label class="d-block">Số điện thoại: {{ $invoice->SoDienThoai }}</label>
                            <label class="d-block">Ghi chú: {{ $invoice->GhiChu ?: '-' }}</label>
                        </div>
                        <a class="btn btn-primary" href="{{ url('/order/phuongthucthanhtoan.php?id=' . $invoice->ID_HoaDon) }}">Thanh toán</a>
                        <a class="btn btn-primary ml-2" href="{{ url('/order/suaOrder.php?id=' . $invoice->ID_HoaDon) }}">Sửa lại thông tin giao hàng</a>
                    @else
                        <h4>Chưa có hóa đơn nào</h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="get-order">
                <h2>Chi tiết hóa đơn</h2>
                <br>
                <div class="tableInfo">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
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
                                @forelse($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->TenSanPham }}</td>
                                        <td>{{ $item->SoLuong }}</td>
                                        <td>{{ number_format($item->GiaBan, 0, ',', '.') }} Đồng</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Không có gì trong giỏ hàng</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        @endif
                    </table>

                    @if(!empty($cart))
                        <h5 class="text-right">Tổng tiền: {{ number_format($cartTotal, 0, ',', '.') }} Đồng</h5>
                        <h5 class="text-right" style="width: 12.5%; margin-left: auto;">{{ $cartItems }}</h5>
                    @elseif($items->count())
                        <h5 class="text-right">Tổng tiền: {{ number_format($invoice->GiaTien, 0, ',', '.') }} Đồng</h5>
                        <h5 class="text-right" style="width: 12.5%; margin-left: auto;">{{ $items->sum('SoLuong') }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
