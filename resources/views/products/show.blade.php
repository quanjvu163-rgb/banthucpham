@extends('layouts.app')

@section('title', $product->TenSanPham)

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="container-fluid">
            <form method="POST" action="{{ url('/cart/add.php?id=' . $product->ID_SanPham) }}">
                @csrf
                <input type="hidden" name="sp_ten" value="{{ $product->TenSanPham }}">
                <input type="hidden" name="sp_gia" value="{{ $product->GiaBan }}">
                <input type="hidden" name="hinhdaidien" value="{{ $product->Img }}">
                <div class="card">
                    <div class="container-fluid">
                        <h3>Thông tin chi tiết về sản phẩm</h3>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6">
                        <img src="{{ asset('image/product/' . $product->Img) }}" class="img-fluid" alt="{{ $product->TenSanPham }}">
                    </div>
                    <div class="col-md-6">
                        <h3>{{ $product->TenSanPham }}</h3>
                        <p>{!! nl2br(e($product->MoTa)) !!}</p>
                        <h4>Giá hiện tại:
                            <span>{{ number_format($product->GiaBan, 0, ',', '.') }} Đồng/Kg</span>
                        </h4>
                        <p><strong>100%</strong> hàng <strong>chất lượng</strong>, đảm bảo <strong>uy tín</strong>!</p>

                        @if(session('TenDangNhap'))
                            <div class="form-group">
                                <label for="soluong">Số lượng đặt mua:</label>
                                <input type="number" class="form-control" id="soluong" name="soluong" value="1" min="1">
                            </div>
                            <div class="action">
                                <input type="submit" class="btn btn-primary" name="submit" value="Mua hàng" style="background-color:#248A32;">
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="container-fluid py-3">
            <h3>Bình luận về sản phẩm</h3>

            @foreach($comments as $comment)
                <div class="alert alert-success" role="alert">
                    <small>
                        <label style="font-weight: bold;">{{ optional($comment->member)->HoVaTen ?? 'Ẩn danh' }}</label>
                        <label>{{ $comment->ThoiGianBinhLuan }}</label>
                    </small>
                    <br>
                    <label style="font-size: 20px">{{ $comment->NoiDung }}</label>
                </div>
            @endforeach

            @if($comments->isEmpty())
                <div class="alert alert-light border">Chưa có bình luận nào cho sản phẩm này.</div>
            @endif

            @if(session('TenDangNhap'))
                <form action="{{ url('/sanpham/actionComment.php?id_product=' . $product->ID_SanPham) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="NoiDung" style="height: 100px" placeholder="Hãy bình luận sản phẩm tại đây"></textarea>
                    </div>
                    <div class="action">
                        <input type="submit" class="btn btn-primary" name="comment" value="Bình luận" style="float:right; background-color:#248A32;">
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
