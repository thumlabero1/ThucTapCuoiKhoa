@extends('admin.main')
@section('head')
@endsection
@section('content')
<form action="add-product" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="productName" class="text-white">Tên sản phẩm:</label>
    <input type="text" class="form-control" id="productName" name="productName" required>
  </div>
  <div class="form-group">
    <label for="productType" class="text-white">Loại sản phẩm:</label>
    <select class="form-control" id="productType" name="productType" required>
      <option value="">Chọn loại sản phẩm</option>
      @foreach($ProductType as $TypeProduct)
      <option value="{{$TypeProduct->ProductType }}">{{$TypeProduct->ProductTypeName}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="description" class="text-white">Mô tả sản phẩm:</label>
    <textarea class="form-control" id="description" name="description" required></textarea>
  </div>
  <div class="form-group">
    <label for="price" class="text-white">Giá:</label>
    <input type="number" class="form-control" id="price" name="price" required>
  </div>
  <div class="form-group">
    <label for="inventory" class="text-white">Tồn kho:</label>
    <input type="number" class="form-control" id="inventory" name="inventory" required>
  </div>
  <div class="form-group">
    <label for="quantity" class="text-white">Số lượng:</label>
    <input type="number" class="form-control" id="quantity" name="quantity" required>
  </div>
  <div class="form-group">
    <label for="manufacturer" class="text-white">Hãng sản xuất:</label>
    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
  </div>
  <div class="form-group">
    <label for="image" class="text-white">Hình ảnh:</label>
    <input type="file" class="form-control-file text-white" id="image" name="image" required>
  </div>
  <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>
@endsection