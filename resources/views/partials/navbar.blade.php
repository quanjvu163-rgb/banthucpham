@php
    $variant = $variant ?? 'root';
    $isLoggedIn = session()->has('TenDangNhap');
    $showSearch = !in_array($variant, ['profile', 'profile-edit', 'catalog-no-search'], true);
@endphp

@if(in_array($variant, ['catalog', 'catalog-no-search', 'profile', 'profile-edit'], true))
<div class="sticky-top">
@endif
<div class="menu sticky-top">
    <nav class="navbar navbar-expand-lg header-custom" style="background-color: #248A32;">
        <div class="container-fluid font-header-custom">
            <a class="navbar-branch" href="{{ url('/index.php') }}">
                <img src="{{ asset('image/logo/logochinh.png') }}" height="80" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/sanpham/index.php') }}" style="color:white;">TẤT CẢ SẢN PHẨM</a>
                    </li>

                    @if($variant === 'root')
                        @if($isLoggedIn)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/cart/index.php') }}" style="color:white;">GIỎ HÀNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/historyOrder.php') }}" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/ThanhVien/logout.php') }}" style="color:white;">ĐĂNG XUẤT</a>
                            </li>
                            <li class="nav-item" style="float: right;">
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/profile.php?id=' . session('ID_ThanhVien')) }}" style="color:white;">{{ session('HoVaTen') }}</a>
                            </li>
                        @else
                            <li>
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/login.php') }}" style="color:white;">&nbsp;ĐĂNG NHẬP</a>
                            </li>
                            <h8> Bạn chưa đăng nhập? hãy đăng nhập để mua hàng</h8>
                        @endif
                    @elseif($variant === 'history')
                        @if($isLoggedIn)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/cart/index.php') }}" style="color:white;">GIỎ HÀNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact.php?id=' . session('ID_ThanhVien')) }}" style="color:white;">LIÊN HỆ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/historyOrder.php') }}" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/ThanhVien/logout.php') }}" style="color:white;">ĐĂNG XUẤT</a>
                            </li>
                            <li class="nav-item" style="float: right;">
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/profile.php?id=' . session('ID_ThanhVien')) }}" style="color:white;">{{ session('HoVaTen') }}</a>
                            </li>
                        @else
                            <li>
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/login.php') }}" style="color:white;">&nbsp;ĐĂNG NHẬP</a>
                            </li>
                            <h8> Bạn chưa đăng nhập? hãy đăng nhập để mua hàng</h8>
                        @endif
                    @elseif(in_array($variant, ['catalog', 'catalog-no-search'], true))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cart/index.php') }}" style="color:white;">GIỎ HÀNG</a>
                        </li>
                        @if($isLoggedIn)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/historyOrder.php') }}" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/ThanhVien/logout.php') }}" style="color:white;">ĐĂNG XUẤT</a>
                            </li>
                            <li class="nav-item">
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/profile.php?id=' . session('ID_ThanhVien')) }}" id="btn" style="color:white;">{{ session('HoVaTen') }}</a>
                            </li>
                        @else
                            <li>
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/login.php') }}">&nbsp;ĐĂNG NHẬP</a>
                            </li>
                        @endif
                    @elseif($variant === 'profile')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cart/index.php') }}" style="color:white;">GIỎ HÀNG</a>
                        </li>
                        @if($isLoggedIn)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/ThanhVien/logout.php') }}" style="color:white;">ĐĂNG XUẤT</a>
                            </li>
                            <li class="nav-item">
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/profile.php?id=' . session('ID_ThanhVien')) }}" id="btn" style="color:white;">{{ session('HoVaTen') }}</a>
                            </li>
                        @else
                            <li>
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/login.php') }}">&nbsp;ĐĂNG NHẬP</a>
                            </li>
                        @endif
                    @elseif($variant === 'profile-edit')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cart/index.php') }}" style="color:white;">GIỎ HÀNG</a>
                        </li>
                        @if($isLoggedIn)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact.php?id=' . session('ID_ThanhVien')) }}" style="color:white;">LIÊN HỆ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/ThanhVien/logout.php') }}" style="color:white;">ĐĂNG XUẤT</a>
                            </li>
                            <li class="nav-item">
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/profile.php?id=' . session('ID_ThanhVien')) }}" id="btn" style="color:white;">{{ session('HoVaTen') }}</a>
                            </li>
                        @else
                            <li>
                                <a type="button" class="btn btn-secondary" href="{{ url('/ThanhVien/login.php') }}">&nbsp;ĐĂNG NHẬP</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
        @if($showSearch)
            <form action="{{ url('/sanpham/actionSanPham.php?TimKiem') }}" class="navbar-form navbar-right" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" placeholder="Tìm Kiếm..." class="form-control" name="tukhoa">
                    <div class="input-group-btn">
                        <input type="submit" class="btn btn-secondary" name="tim" value="Tìm">
                    </div>
                </div>
            </form>
        @endif
    </nav>
</div>
@if(in_array($variant, ['catalog', 'catalog-no-search', 'profile', 'profile-edit'], true))
</div>
@endif