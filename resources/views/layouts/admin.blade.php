<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản trị')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    @stack('styles')
</head>
<body>
    @php
        $currentView = $view ?? 'dashboard';
        $supplierViews = ['list-post', 'add-post', 'SuaNCC'];
        $productViews = ['list-product', 'add-product', 'cat-product', 'fixCategory', 'suaSanPham'];
        $orderViews = ['list-order', 'edit-order'];
        $userViews = ['list-user', 'add-user', 'fixUser'];
    @endphp

    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="{{ url('/admin/index.php?view=dashboard') }}">Quản lý</a></div>
            <div class="nav-right">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/admin/index.php?view=add-product') }}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{ url('/admin/index.php?view=cat-product') }}">Thêm danh mục</a>
                        <a class="dropdown-item" href="{{ url('/admin/index.php?view=add-post') }}">Thêm nhà cung cấp</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chúc Thu
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>
                        <a class="dropdown-item" href="{{ url('/admin/logout.php') }}">Thoát</a>
                    </div>
                </div>
            </div>
        </nav>

        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    <li class="nav-link {{ $currentView === 'dashboard' ? 'active' : '' }}">
                        <a href="{{ url('/admin/index.php?view=dashboard') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bảng thống kê
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>

                    <li class="nav-link {{ in_array($currentView, $supplierViews, true) ? 'active' : '' }}">
                        <a href="{{ url('/admin/index.php?view=list-post') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Nhà cung cấp
                        </a>
                        <i class="arrow fas {{ in_array($currentView, $supplierViews, true) ? 'fa-angle-down' : 'fa-angle-right' }}"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/admin/index.php?view=add-post') }}">Thêm mới</a></li>
                            <li><a href="{{ url('/admin/index.php?view=list-post') }}">Danh sách</a></li>
                        </ul>
                    </li>

                    <li class="nav-link {{ in_array($currentView, $productViews, true) ? 'active' : '' }}">
                        <a href="{{ url('/admin/index.php?view=list-product') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas {{ in_array($currentView, $productViews, true) ? 'fa-angle-down' : 'fa-angle-right' }}"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/admin/index.php?view=add-product') }}">Thêm mới</a></li>
                            <li><a href="{{ url('/admin/index.php?view=list-product') }}">Danh sách</a></li>
                            <li><a href="{{ url('/admin/index.php?view=cat-product') }}">Danh mục</a></li>
                        </ul>
                    </li>

                    <li class="nav-link {{ in_array($currentView, $orderViews, true) ? 'active' : '' }}">
                        <a href="{{ url('/admin/index.php?view=list-order') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Thống kê doanh thu
                        </a>
                        <i class="arrow fas {{ in_array($currentView, $orderViews, true) ? 'fa-angle-down' : 'fa-angle-right' }}"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/admin/index.php?view=list-order') }}">Đơn hàng</a></li>
                        </ul>
                    </li>

                    <li class="nav-link {{ in_array($currentView, $userViews, true) ? 'active' : '' }}">
                        <a href="{{ url('/admin/index.php?view=list-user') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Quản lý thành viên
                        </a>
                        <i class="arrow fas {{ in_array($currentView, $userViews, true) ? 'fa-angle-down' : 'fa-angle-right' }}"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/admin/index.php?view=list-user') }}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div id="wp-content">
                @if ($errors->any())
                    <div class="container-fluid pt-3">
                        <div class="alert alert-danger mb-0">
                            <ul class="mb-0 pl-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('admin-assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
