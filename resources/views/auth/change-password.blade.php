@extends('layouts.app')

@section('title', 'Đổi mật khẩu')

@section('navbar_variant', 'profile-edit')
@section('footer_variant', 'plain')
@section('footer_year', '2023')


@section('content')
<div class="container">
    <br>
    <hr>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Đổi mật khẩu</h4>

            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form method="POST" action="{{ url('/ThanhVien/changePassword.php?id=' . $member->ID_ThanhVien) }}">
                @csrf
                <label><b>Mật khẩu cũ&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</b></label>
                <input type="password" name="old-password" required style="width: 220px;">
                <label><b>Mật khẩu mới &nbsp; &nbsp; &nbsp; &nbsp;</b></label>
                <input type="password" name="new-password" required style="width: 217px;">
                <label><b>Nhập lại mật khẩu</b></label>
                <input type="password" name="new-password-repeat" required style="width: 220px;">
                <br>
                <br>
                <input type="submit" class="btn btn-primary btn-block" name="sua" value="Sửa" style="float: right; width:100px;">
            </form>
        </article>
    </div>
    <hr class="hr--large">
</div>
@endsection
