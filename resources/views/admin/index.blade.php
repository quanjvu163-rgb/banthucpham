@extends('layouts.admin')

@section('title', 'Quản Lý')

@section('content')
    @includeIf('admin.pages.' . $view)
@endsection
