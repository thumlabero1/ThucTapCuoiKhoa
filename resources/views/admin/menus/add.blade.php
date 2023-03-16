@extends('admin.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
<h2 class="text-white text-center">Thêm danh mục</h2>
  <form action="/store" method="POST">
    <div class="form-group mb-3">
      <label for="menu" class="form-label text-white font-weight-bold">Tên danh mục</label>
      <input type="text" class="form-control" name ="menu" id="menu" placeholder="Enter product name">
    </div>

    <div class="mb-3">
      <label class="form-label text-white font-weight-bold">Danh mục cha</label>
      <select class="form-control" name="parent_id" id="">
        <option value="0">
          Danh mục cha
        </option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Mô tả</label>
      <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product description"></textarea>
    </div>

    <div class="mb-3 content" id=content>
      <label for="menu" class="form-label text-white font-weight-bold">Mô tả chi tiết</label>
      <textarea name="content" class="form-control" id="content"></textarea>
    </div>

    <div class="form-group">
      <label for="active" class="form-label text-white font-weight-bold">Trạng thái kích hoạt</label>
      <select class="form-select form-control" id="active" name="active">
        <option value="1">Có</option>
        <option value="0">Không</option>
      </select>
    </div> 
<br>
    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    @csrf
  </form>
  <script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection

@section('footer')
@endsection
