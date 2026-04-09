@extends('layouts.app')

@section('title', 'Thanh toán trực tuyến')

@section('navbar_variant', 'catalog-no-search')
@section('footer_variant', 'hide')

@section('content')
<div class="container py-4">
    <div class="mx-auto" style="max-width: 760px;">
        <form method="POST" action="{{ url('/order/dathang.php?id=' . $invoice->ID_HoaDon) }}">
            @csrf

            @if($invoice->XuLy == 1)
                <h4>Bạn đã đặt hàng thành công!</h4>
            @elseif($invoice->XuLy == 2)
                <h4>Bạn đã đặt hàng thất bại!</h4>
            @else
                <h4>Hãy chờ người xét duyệt đơn đặt hàng của bạn</h4>
                <h5>Mã hóa đơn của bạn là: {{ $invoice->ID_HoaDon }}</h5>
            @endif

            <input type="submit" name="back" value="Trở về trang chủ. Hãy nhấn vào đây" class="btn btn-primary mt-3">
        </form>
    </div>
</div>
@endsection