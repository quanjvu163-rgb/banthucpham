<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bán Thực Phẩm')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @stack('styles')
</head>
<body>
    @php
        $navbarVariant = trim($__env->yieldContent('navbar_variant')) ?: 'root';
        $footerVariant = trim($__env->yieldContent('footer_variant')) ?: 'default';
        $footerYear = trim($__env->yieldContent('footer_year')) ?: '2023';
    @endphp

    @include('partials.navbar', ['variant' => $navbarVariant])

    @if ($errors->any())
        <div class="container mt-3">
            <div class="alert alert-danger mb-0">
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @if ($footerVariant !== 'hide')
        @include('partials.footer', ['variant' => $footerVariant, 'year' => $footerYear])
    @endif

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html>