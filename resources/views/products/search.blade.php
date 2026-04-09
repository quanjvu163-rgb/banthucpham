@extends('layouts.app')

@section('title', $title)

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')


@push('styles')
<style>
    .catalog-sidebar-legacy {
        position: fixed;
        top: 225px;
        left: 15px;
    }
    .catalog-result-wrap::after {
        content: "";
        display: block;
        clear: both;
    }
    .catalog-product-card {
        float: left;
        width: 25%;
    }
    .catalog-product-card.search-mode {
        width: 50%;
    }
    .catalog-product-card img {
        width: 100%;
        height: auto;
    }
    @media (max-width: 991.98px) {
        .catalog-sidebar-legacy {
            position: static;
        }
        .catalog-product-card,
        .catalog-product-card.search-mode {
            width: 50%;
        }
    }
    @media (max-width: 575.98px) {
        .catalog-product-card,
        .catalog-product-card.search-mode {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="catalog-sidebar-legacy d-none d-lg-block">
        <ul class="nav flex-column">
            <h4>Liệt kê theo</h4>
            <br>
            @foreach($categories as $category)
                <a class="btn btn-primary" href="{{ url('/sanpham/actionSanpham.php?danhmucsanpham&id=' . $category->ID_DanhMuc) }}"
                    style="background-color: #248A32; border-color:#248A32;">
                    {{ $category->TenDanhMuc }}
                </a>
                <br>
                <br>
            @endforeach
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row d-inline-flex">
            <div id="allproduct" class="catalog-result-wrap" style="width:100%;">
                <div style="text-align: center;">
                    <h1>{{ $title }}</h1>
                </div>

                @forelse($products as $product)
                    <form class="card catalog-product-card {{ $isSearch ? 'search-mode' : '' }}"
                        action="{{ url('/sanpham/infoProduct.php?id_product=' . $product->ID_SanPham) }}" method="GET">
                        <div class="d-flex flex-column text-center border">
                            <img src="{{ asset('image/product/' . $product->Img) }}" alt="{{ $product->TenSanPham }}">
                            <h2>{{ $product->TenSanPham }}</h2>
                            <h6>Giá: {{ number_format($product->GiaBan, 0, ',', '.') }} VND</h6>
                            <input type="hidden" name="id_product" value="{{ $product->ID_SanPham }}">
                            <input type="submit" class="btn btn-info" value="{{ session('TenDangNhap') ? 'Mua' : 'Xem thông tin' }}">
                        </div>
                    </form>
                @empty
                    <div class="alert alert-warning mt-3">Không tìm thấy sản phẩm phù hợp.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
