@extends('layouts.app')

@section('title', 'Sản phẩm')

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2021')


@push('styles')
<style>
    .catalog-sidebar {
        position: sticky;
        top: 120px;
    }
    .catalog-promo {
        position: sticky;
        top: 220px;
    }
    .product-legacy-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    @media (max-width: 991.98px) {
        .catalog-sidebar,
        .catalog-promo {
            position: static;
        }
        .catalog-promo {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-2 mb-4">
            <div class="catalog-sidebar">
                <h4>Liệt kê theo</h4>
                @foreach($categories as $category)
                    <a class="btn btn-success btn-block mb-3" href="{{ url('/sanpham/actionSanpham.php?danhmucsanpham&id=' . $category->ID_DanhMuc) }}">
                        {{ $category->TenDanhMuc }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="col-lg-8">
            <div id="allproduct" class="mb-5">
                <div class="text-center mb-4">
                    <h1>Tất cả sản phẩm</h1>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-6 col-xl-3 mb-4">
                            <form class="card product-legacy-card h-100" action="{{ url('/sanpham/infoProduct.php') }}" method="GET">
                                <div class="d-flex flex-column text-center border h-100">
                                    <img src="{{ asset('image/product/' . $product->Img) }}" alt="{{ $product->TenSanPham }}">
                                    <div class="p-3 d-flex flex-column h-100">
                                        <h5>{{ $product->TenSanPham }}</h5>
                                        <h6>Giá: {{ number_format($product->GiaBan, 0, ',', '.') }} VND</h6>
                                        <input type="hidden" name="id_product" value="{{ $product->ID_SanPham }}">
                                        <input type="submit" class="btn btn-info mt-auto" value="{{ session('TenDangNhap') ? 'Mua' : 'Xem thông tin' }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="vege" class="mb-5">
                <div class="text-center mb-4">
                    <h1>Rau sạch</h1>
                </div>
                <div class="row">
                    @foreach($vegeProducts as $product)
                        <div class="col-md-6 col-xl-3 mb-4">
                            <form class="card product-legacy-card h-100" action="{{ url('/sanpham/infoProduct.php') }}" method="GET">
                                <div class="d-flex flex-column text-center border h-100">
                                    <img src="{{ asset('image/product/' . $product->Img) }}" alt="{{ $product->TenSanPham }}">
                                    <div class="p-3 d-flex flex-column h-100">
                                        <h5>{{ $product->TenSanPham }}</h5>
                                        <h6>Giá: {{ number_format($product->GiaBan, 0, ',', '.') }} VND</h6>
                                        <input type="hidden" name="id_product" value="{{ $product->ID_SanPham }}">
                                        <input type="submit" class="btn btn-info mt-auto" value="{{ session('TenDangNhap') ? 'Mua' : 'Xem thông tin' }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="fru" class="mb-5">
                <div class="text-center mb-4">
                    <h1>Củ và Quả</h1>
                </div>
                <div class="row">
                    @foreach($fruProducts as $product)
                        <div class="col-md-6 col-xl-3 mb-4">
                            <form class="card product-legacy-card h-100" action="{{ url('/sanpham/infoProduct.php') }}" method="GET">
                                <div class="d-flex flex-column text-center border h-100">
                                    <img src="{{ asset('image/product/' . $product->Img) }}" alt="{{ $product->TenSanPham }}">
                                    <div class="p-3 d-flex flex-column h-100">
                                        <h5>{{ $product->TenSanPham }}</h5>
                                        <h6>Giá: {{ number_format($product->GiaBan, 0, ',', '.') }} VND</h6>
                                        <input type="hidden" name="id_product" value="{{ $product->ID_SanPham }}">
                                        <input type="submit" class="btn btn-info mt-auto" value="{{ session('TenDangNhap') ? 'Mua' : 'Xem thông tin' }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="meat" class="mb-5">
                <div class="text-center mb-4">
                    <h1>Thịt tươi</h1>
                </div>
                <div class="row">
                    @foreach($meatProducts as $product)
                        <div class="col-md-6 col-xl-3 mb-4">
                            <form class="card product-legacy-card h-100" action="{{ url('/sanpham/infoProduct.php') }}" method="GET">
                                <div class="d-flex flex-column text-center border h-100">
                                    <img src="{{ asset('image/product/' . $product->Img) }}" alt="{{ $product->TenSanPham }}">
                                    <div class="p-3 d-flex flex-column h-100">
                                        <h5>{{ $product->TenSanPham }}</h5>
                                        <h6>Giá: {{ number_format($product->GiaBan, 0, ',', '.') }} VND</h6>
                                        <input type="hidden" name="id_product" value="{{ $product->ID_SanPham }}">
                                        <input type="submit" class="btn btn-info mt-auto" value="{{ session('TenDangNhap') ? 'Mua' : 'Xem thông tin' }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="catalog-promo">
                <a href="#">
                    <img src="{{ asset('image/quangcaoo/thanh2.png') }}" style="width: 100%;" alt="Khuyến mãi">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
