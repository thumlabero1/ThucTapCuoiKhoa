<!DOCTYPE html>
<html lang="en">
<head>
@include('homepage.head')
  </head>
<body>
    <h1>trang chủ</h1>
@include('homepage.navbar')
  <div class="container d-flex justify-content-center">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h3>Danh mục sản phẩm</h3>
        <ul class="list-group danhsach danh-sach-hover">
          @foreach($ProductType as $TypeProduct)
        <a class="list-group-item danhsach text-white" href="/homepage/{{$TypeProduct->ProductType}}">{{$TypeProduct->ProductTypeName}}</a>
        @endforeach
        </ul>
      </div>

      <div class="col-md-9">
        <h3>Sản phẩm mới nhất</h3>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img src="https://via.placeholder.com/150x150.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Sản phẩm 1</h5>
                <p class="card-text">Mô tả sản phẩm 1.</p>
                <a href="#" class="btn btn-primary">Giá</a>
                <br></br>
                <button class="btn btn-success"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
              </div>
            </div>
      </div>
</div>
  
</body>
</html>