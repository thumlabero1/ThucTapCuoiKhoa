@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="/admin/category-blog/store" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="Content">Nội dung</label>
                <textarea class="form-control" id="content" name="content" placeholder="Enter Content">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="thumb">Hình ảnh</label>
                <input type="file" class="form-control" id="upload" placeholder="upload">
                <div id="image_review">
                </div>
                <input type="hidden" name="thumb" id="file">
            </div>
            <div class="form-group">
                <label for="active">Hiển thị</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active"
                        checked="">
                    <label for="customRadio1" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active">
                    <label for="customRadio2" class="custom-control-label">Không</label>
                </div>

            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
