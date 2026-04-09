@extends('layouts.app')

@section('title', 'Sửa thông tin')

@section('navbar_variant', 'profile-edit')
@section('footer_variant', 'plain')
@section('footer_year', '2023')


@push('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
@endpush

@section('content')
<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Thông tin cá nhân</h4>

            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form method="POST" action="{{ url('/ThanhVien/profilefix.php?id=' . $member->ID_ThanhVien) }}">
                @csrf
                <div class="form-group input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input name="HoVaTen" class="form-control" value="{{ $member->HoVaTen }}">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input name="Email" class="form-control" value="{{ $member->Email }}">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    <input name="SoDienThoai" class="form-control" value="{{ $member->SoDienThoai }}">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                    <input name="DiaChi" class="form-control" type="text" value="{{ $member->DiaChi }}">
                </div>
                <br>
                <div class="form-group">
                    <p>Sau khi nhấn nút sửa bạn sẽ phải đăng nhập lại.<br>Bạn có chắc chứ?</p>
                    <input type="submit" class="btn btn-primary btn-block" name="sua" value="Sửa">
                </div>
            </form>
        </article>
    </div>
    <hr class="hr--large">
</div>
@endsection
