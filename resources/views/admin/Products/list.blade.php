@extends('admin.main')
@section('head')
@endsection

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
    <th class="text-white">id</th>
      <th class="text-white">Tên sản phẩm</th>
      <th class="text-white">Loại sản phẩm</th>
      <th class="text-white">Giá</th>
      <th class="text-white">Tồn kho</th>
      <th class="text-white">Nhà cung cấp</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Products->sortBy('id') as $Product)
  <tr>
        <td class ="text-white">{{$Product->id}}</td>
        <td class ="text-white">{{$Product->ProductName}}</td>
        <td class ="text-white">{{$Product->ProductType}}</td>
        <td class ="text-white">{{$Product->Price}}</td>
        <td class ="text-white">{{$Product->Inventory}}</td>
        <td class ="text-white">{{$Product->Manufacturer}}</td>
        <td class="btn btn-warning"><a href="/admin/Product/list/{{$Product->id}}"><i class='fas fa-edit'></i></a></td>
        <td>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
  </tr>
  @endforeach
  </tbody>
  <a class="btn btn-primary" href="add">Thêm sản phẩm</a>
</table>

@endsection