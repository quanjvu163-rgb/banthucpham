@extends('layouts.app')

@section('title', 'Trang chủ')

@section('navbar_variant', 'root')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@push('styles')
<style>
    @media (max-width: 1199.98px) {
        .home-fixed-banner {
            display: none;
        }
    }
    .legacy-home-products::after {
        content: "";
        display: block;
        clear: both;
    }
    .legacy-home-card {
        width: 25%;
        float: left;
        text-align: center;
    }
    .legacy-home-card img {
        width: 100%;
        height: auto;
    }
    @media (max-width: 991.98px) {
        .legacy-home-card {
            width: 50%;
        }
    }
    @media (max-width: 575.98px) {
        .legacy-home-card {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<div class="home-fixed-banner position-fixed" style="top:200px; left:10px;">
    <img src="{{ asset('image/quangcaoo/thanh2.png') }}" width="50%" alt="banner trái">
</div>

<div class="home-fixed-banner position-fixed" style="top:160px; right:-350px;">
    <img src="{{ asset('image/quangcaoo/thanh3.png') }}" width="30%" alt="banner phải 1">
    <br>
    <img src="{{ asset('image/quangcaoo/thanh4.png') }}" width="30%" alt="banner phải 2">
</div>

<div class="container">
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="text-align:center; width:100%; height:auto;" src="{{ asset('image/quangcaoo/bia3.png') }}" alt="banner 1">
            </div>
            <div class="carousel-item">
                <img style="text-align:center; width:100%; height:auto;" src="{{ asset('image/quangcaoo/bia4.png') }}" alt="banner 2">
            </div>
            <div class="carousel-item">
                <img style="text-align:center; width:100%; height:auto;" src="{{ asset('image/quangcaoo/bia2.png') }}" alt="banner 3">
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <img style="width:638px; height:auto; max-width:100%;" src="{{ asset('image/hotdealtrongthang.png') }}" alt="hot deal">
</div>

<div style="width:100%" class="mt-4">
    <div class="container legacy-home-products">
        @forelse($products as $product)
            <form action="{{ url('/sanpham/infoProduct.php') }}" method="GET">
                <div style="margin: 20px;">
                    <div class="card legacy-home-card">
                        <img src="{{ asset('image/product/' . $product->Img) }}" class="card-img-top" alt="{{ $product->TenSanPham }}">
                        <div class="card-body">
                            <h2>{{ $product->TenSanPham }}</h2>
                            <h6>Giá: {{ number_format($product->GiaBan, 0, ',', '.') }} VND</h6>
                            <input type="hidden" name="id_product" value="{{ $product->ID_SanPham }}">
                            <input type="submit" class="btn btn-info" value="{{ session('TenDangNhap') ? 'Mua' : 'Xem thông tin' }}">
                        </div>
                    </div>
                </div>
            </form>
        @empty
            <div class="alert alert-info">Chưa có sản phẩm nào.</div>
        @endforelse
    </div>
</div>
@endsection
