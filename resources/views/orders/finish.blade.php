@extends('layouts.app')

@section('title', 'Đặt hàng')

@section('navbar_variant', 'catalog')
@section('footer_variant', 'default')
@section('footer_year', '2023')

@section('content')
<div class="container py-4">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="card px-4 shadow-sm">
            <div class="card-body">
                <h4 class="mb-4">Thanh Toán Trực Tuyến</h4>

                <div class="row gx-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control" type="text" value="{{ session('HoVaTen') }}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Tên Ngân Hàng</label>
                            <input class="form-control" type="text" value="Agribank" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Số tài khoản ngân hàng</label>
                            <input class="form-control" type="text" value="1234 5678 435678" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngày đăng ký</label>
                            <input class="form-control" type="text" value="MM/YY" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input class="form-control" type="password" value="***" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <a type="button" class="btn btn-secondary" href="{{ url('/order/dathang.php') }}">
                            Thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection