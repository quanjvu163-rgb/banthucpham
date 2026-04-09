@extends('layouts.app')

@section('title', 'Sửa thông tin đơn hàng')

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@section('content')
<div class="container py-4">
    <div class="mx-auto" style="max-width: 760px;">
        <h2 class="mb-3">Sửa thông tin đơn hàng</h2>

        <div class="alert alert-success">
            <form method="POST" action="{{ url('/order/suaOrder.php?id=' . $invoice->ID_HoaDon) }}">
                @csrf
                <div class="mb-3">
                    <label class="d-block">Tên khách hàng: {{ $member->HoVaTen }}</label>
                    <label class="d-block">Mã hóa đơn: {{ $invoice->ID_HoaDon }}</label>
                    <label class="d-block">Thời gian tạo: {{ $invoice->ThoiGianLap }}</label>
                    <label class="d-block">Tổng tiền: {{ number_format($invoice->GiaTien, 0, ',', '.') }} Đồng</label>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="DiaChi" value="{{ $invoice->DiaChi }}">
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input class="form-control" type="text" name="SoDienThoai" value="{{ $invoice->SoDienThoai }}">
                </div>
                <div class="form-group">
                    <label>Ghi chú</label>
                    <input class="form-control" type="text" name="GhiChu" value="{{ $invoice->GhiChu }}">
                </div>

                <input type="submit" name="sua" value="Sửa" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
