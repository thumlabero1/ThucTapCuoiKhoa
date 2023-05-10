@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form method="POST" action="/admin/employees/store">
@csrf
    <div class="form-group">
        <label for="name">Tên nhân viên</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="position">Chức vụ</label>
        <input type="text" class="form-control" id="position" name="position" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
    
</form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
