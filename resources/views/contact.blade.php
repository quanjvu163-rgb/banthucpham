@extends('layouts.app')

@section('title', 'Liên hệ')

@section('navbar_variant', 'root')
@section('footer_variant', 'hide')


@section('content')
<div class="container">
    <h2 class="text-center mt-4 mb-4">Liên hệ</h2>

    <div class="get-order mx-auto" style="max-width: 600px;">
        <div class="alert alert-success" role="alert">
            @if(session('success'))
                <div class="mb-3 font-weight-bold">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ url('/contact.php?id=' . $member->ID_ThanhVien) }}">
                @csrf
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input class="form-control" style="width:300px" type="text" name="name" value="{{ $member->HoVaTen }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" style="width:300px" type="text" name="email" value="{{ $member->Email }}">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" name="NoiDung" rows="5">{{ old('NoiDung') }}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="contact" value="Gửi">
            </form>
        </div>
    </div>
</div>
@endsection
