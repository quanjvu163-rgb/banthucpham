@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@section('content')
<div class="container">
    <h2>Giỏ hàng</h2>
    <br>
    <div class="tableInfo">
        @if($member)
            <form method="POST" action="{{ url('/order/saveorder.php?id=' . $member->ID_ThanhVien) }}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cart as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $key }}</td>
                                <td>{{ $item['TenSanPham'] }}</td>
                                <td><img src="{{ asset('image/product/' . $item['Img']) }}" style="max-width: 120px;" alt="{{ $item['TenSanPham'] }}"></td>
                                <td>{{ $item['qty'] }}</td>
                                <td>{{ number_format($item['GiaBan'], 0, ',', '.') }} Đồng/Kg</td>
                                <td><a href="{{ url('/cart/actionCart.php?id_product=' . $key) }}">Xóa</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Không có gì trong giỏ hàng</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if(!empty($cart))
                    <h4 class="text-right">Tổng tiền: {{ number_format($total, 0, ',', '.') }} Đồng</h4>
                    <h5 class="text-right" style="width: 3%; margin-left: auto;">{{ $items }}</h5>
                    <br>
                    <input type="submit" class="btn btn-info" name="submit" value="Thanh toán" style="float:right; width: 20%;">
                @endif
            </form>
        @else
            <h4>Vui lòng đăng nhập để mua hàng</h4>
        @endif
    </div>
</div>
@endsection
