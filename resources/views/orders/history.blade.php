@extends('layouts.app')

@section('title', 'Lịch sử đặt hàng')

@section('navbar_variant', 'history')
@section('footer_variant', 'hide')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="duyet">
                <h3>Đơn đã được duyệt</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thời gian đặt</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Giá tiền</th>
                            <th>Số điện thoại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($approved as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->ID_HoaDon }}</td>
                                <td>{{ $order->ThoiGianLap }}</td>
                                <td>{{ $order->DiaChi }}</td>
                                <td>{{ $order->GhiChu }}</td>
                                <td>{{ $order->GiaTien }}</td>
                                <td>{{ $order->SoDienThoai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Không có lịch sử đặt hàng</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="duyet">
                <h3>Đơn chưa được duyệt</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thời gian đặt</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Giá tiền</th>
                            <th>Số điện thoại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pending as $order)
                            <tr style="color: red;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->ID_HoaDon }}</td>
                                <td>{{ $order->ThoiGianLap }}</td>
                                <td>{{ $order->DiaChi }}</td>
                                <td>{{ $order->GhiChu }}</td>
                                <td>{{ $order->GiaTien }}</td>
                                <td>{{ $order->SoDienThoai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Không có lịch sử đặt hàng</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
