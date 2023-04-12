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
  <div class="row" style="padding: 20px;">
    @foreach($Products->sortBy('id') as $Product)
      <div class="col-md-4">
        <div class="card my-card">
          <img src="https://via.placeholder.com/150x150.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$Product->ProductName}}</h5>
            <p class="card-text">Loại:
              @foreach($ProductType as $type)
                @if($type->ProductType == $Product->ProductType)
                  {{$type->ProductTypeName}}
                @endif
              @endforeach
            </p>
            <a href="#" class="btn btn-primary">{{ number_format($Product->Price, 2, '.', ',') . ' VND'}}</a>
            <br></br>
            <button class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
          </div>
        </div>
      </div>
      @if($loop->iteration % 3 == 0)
        </div><div class="row">
      @endif
    @endforeach
  </div>
</div>

  
</body>
</html>