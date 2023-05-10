@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th width="50px">STT</th>
                <th>Tên</th>
                <th>Hiển thị</th>
                <th>Cập nhật</th>
                <th width="200px">Cài đặt</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::categoryblog($menus) !!}
        </tbody>
    </table>
@endsection
