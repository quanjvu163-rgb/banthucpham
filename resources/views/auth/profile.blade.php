@extends('layouts.app')

@section('title', 'Thông tin cá nhân')

@section('navbar_variant', 'profile')
@section('footer_variant', 'plain')
@section('footer_year', '2023')


@push('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
@endpush

@section('content')
<div class="container">
    <br>
    <hr>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Thông tin cá nhân</h4>
            <form>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input name="HoVaTen" class="form-control" value="{{ $member->HoVaTen }}" readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="Email" class="form-control" value="{{ $member->Email }}" readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input class="form-control" value="{{ $member->SoDienThoai }}" readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                    </div>
                    <input class="form-control" type="text" value="{{ $member->DiaChi }}" readonly>
                </div>
                <br>
                <p class="text-center">Bạn muốn đổi mật khẩu? <a href="{{ url('/ThanhVien/changePassword.php?id=' . $member->ID_ThanhVien) }}">Nhấn vào đây</a></p>
                <p class="text-center">Bạn muốn sửa thông tin? <a href="{{ url('/ThanhVien/profilefix.php?id=' . $member->ID_ThanhVien) }}">Nhấn vào đây</a></p>
            </form>
        </article>
    </div>
    <hr class="hr--large">
</div>
@endsection
