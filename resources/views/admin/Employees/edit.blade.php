@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form method="POST" action="/admin/employees/edit/{{ $employees->id }}">
@csrf
    <div class="form-group">
        <label for="name">Tên nhân viên</label>
        <input type="text" class="form-control" id="name" name="name" value= "{{ $employees->name }}" required>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control" id="address" name="address" value= "{{ $employees->address }}" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" value= "{{ $employees->phone }}" required>
    </div>
    <div class="form-group">
        <label for="position">Chức vụ</label>
        <input type="text" class="form-control" id="position" name="position" value= "{{ $employees->position }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    
</form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
