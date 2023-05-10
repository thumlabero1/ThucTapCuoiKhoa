@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="/admin/category-blog/edit/{{ $menu->id }}" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" value="{{ $menu->name }}" class="form-control" id="name" name="name"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="Content">Nội dung</label>
                <textarea class="form-control" id="content" name="content">{{ $menu->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="thumb">Hình ảnh</label>
                <input type="file" class="form-control" id="upload" placeholder="upload">
                <div id="image_review">
                    <a href="{{ $menu->thumb }}" target="_blank"><img src="{{ $menu->thumb }}" width="100px" /></a>
                </div>
                <input type="hidden" value="{{ $menu->thumb }}" name="thumb" id="file">
            </div>

            <div class="form-group">
                <label for="active">Hiển thị</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active"
                        {{ $menu->active == 1 ? 'checked' : '' }}>
                    <label for="customRadio1" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active"
                        {{ $menu->active == 0 ? 'checked' : '' }}>
                    <label for="customRadio2" class="custom-control-label">Không</label>
                </div>

            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Reset</button>
        </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
